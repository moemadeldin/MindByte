<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Course;
use App\Services\BillingSyncService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;

final class StripeController extends Controller
{
    public function __construct(private readonly BillingSyncService $billingService)
    {
        Stripe::setApiKey(config('services.stripe.pk'));
    }

    /**
     * Cart Checkout Page
     */
    public function checkout(): View
    {
        $user = Auth::user();
        $cart = $user->cart()->with('items.course')->first();

        return view('stripe.checkout', compact('cart'));
    }

    /**
     * Buy Now - Direct purchase for single course
     */
    public function buyNow(Course $course): RedirectResponse
    {
        try {
            session(['buy_now_course' => $course->id]);
            return redirect()->route('checkout.single');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', 'Unable to process Buy Now: '.$e->getMessage());
        }
    }

    /**
     * Single Course Checkout Page
     */
    public function singleCheckout(): View|RedirectResponse
    {
        $courseId = session('buy_now_course');

        if (! $courseId) {
            return redirect()->route('courses.index')
                ->with('error', 'No course selected for purchase');
        }

        $course = Course::findOrFail($courseId);
        return view('stripe.checkout-single', compact('course'));
    }

    /**
     * Create Stripe Session for Cart
     */
    public function createCheckoutSession(): RedirectResponse
    {
        try {
            $user = Auth::user();
            $cart = $user->cart()->with('items.course')->first();

            if (! $cart || $cart->items->isEmpty()) {
                return redirect()->route('checkout')->with('error', 'Your cart is empty');
            }

            $lineItems = $cart->items->map(function (CartItem $item): array {
                $course = $item->course;
                return [
                    'price_data' => [
                        'currency' => 'gbp',
                        'product_data' => [
                            'name' => $course->name,
                            'description' => mb_substr($course->description, 0, 200),
                        ],
                        'unit_amount' => (int) ($course->price * 100),
                    ],
                    'quantity' => 1,
                ];
            })->toArray();

            $session = Session::create([
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('stripe.success').'?session_id={CHECKOUT_SESSION_ID}&type=cart',
                'cancel_url' => route('checkout'),
                'customer_email' => $user->email,
                'metadata' => [
                    'user_id' => $user->id,
                    'purchase_type' => 'cart',
                ],
            ]);

            return redirect()->away($session->url);
        } catch (ApiErrorException $e) {
            return redirect()->route('checkout')
                ->with('error', 'Payment session creation failed: '.$e->getMessage());
        }
    }

    /**
     * Create Stripe Session for Single Course
     */
    public function createSingleCheckoutSession(): RedirectResponse
    {
        try {
            $user = Auth::user();
            $courseId = session('buy_now_course');
            $course = Course::findOrFail($courseId);

            $session = Session::create([
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'gbp',
                        'product_data' => ['name' => $course->name],
                        'unit_amount' => (int) ($course->price * 100),
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('stripe.success').'?session_id={CHECKOUT_SESSION_ID}&type=single&course_id='.$course->id,
                'cancel_url' => route('checkout.single'),
                'customer_email' => $user->email,
                'metadata' => [
                    'course_id' => $course->id,
                    'user_id' => $user->id,
                    'purchase_type' => 'single',
                ],
            ]);

            return redirect()->away($session->url);
        } catch (Exception $e) {
            return redirect()->route('checkout.single')->with('error', $e->getMessage());
        }
    }

    /**
     * Handle Successful Payment
     */
    public function success(Request $request): View
    {
        $sessionId = $request->get('session_id');
        $purchaseType = $request->get('type');
        $user = Auth::user();

        try {
            if (!$sessionId) {
                return view('stripe.success', ['error' => 'No session found']);
            }

            $session = Session::retrieve($sessionId);

            if ($session->payment_status === 'paid') {
                if ($purchaseType === 'single') {
                    $course = Course::findOrFail($request->get('course_id'));
                    
                    $this->enrollUserInCourse($user, $course);
                    $this->syncToBilling($user, [$course]);
                    
                    session()->forget('buy_now_course');

                    return view('stripe.success', compact('session', 'course', 'purchaseType'));
                } else {
                    $cart = $user->cart()->with('items.course')->first();
                    
                    if ($cart) {
                        $courses = $cart->items->pluck('course');
                        
                        $this->processSuccessfulPayment($cart, $session);
                        $this->syncToBilling($user, $courses);

                        return view('stripe.success', compact('session', 'cart', 'purchaseType'));
                    }
                }
            }

            return view('stripe.success', ['error' => 'Payment verification failed']);
        } catch (Exception $e) {
            return view('stripe.success', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Helper: Sync data to SyncInvoice per teacher
     */
    private function syncToBilling($student, $courses): void
    {
        foreach ($courses as $course) {
            $teacher = $course->teacher;
            
            if ($teacher && $teacher->sync_invoice_id) {
                $this->billingService->sync($student, [$course], $teacher->sync_invoice_id);
            }
        }
    }

    private function processSuccessfulPayment(Cart $cart, Session $session): void
    {
        foreach ($cart->items as $item) {
            $this->enrollUserInCourse($cart->user, $item->course);
        }

        $cart->items()->delete();
        $cart->forceDelete();
    }

    private function enrollUserInCourse($user, $course): void
    {
        if (! $user->enrollments()->where('course_id', $course->id)->exists()) {
            $user->enrollments()->create([
                'course_id' => $course->id,
                'enrolled_at' => now(),
            ]);
        }
    }
}