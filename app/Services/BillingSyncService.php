<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

final class BillingSyncService
{
    /**
     * Sync a purchase from MindByte to SyncInvoice.
     * * @param mixed $student The Student User model
     * @param iterable $items Collection or Array of Course models
     * @param string $teacherUuid The UUID of the Teacher in the SyncInvoice app
     */
    public function sync($student, iterable $items, string $teacherUuid): void
    {
        Log::info("Syncing Invoice: Student {$student->email} -> Teacher UUID {$teacherUuid}");
        try {
            $totalAmount = collect($items)->sum('price');
            $description = "Course(s): " . collect($items)->pluck('name')->implode(', ');

            // 1. Prepare the payload
            $payload = [
                'user_id'        => $teacherUuid,        // The Teacher (Owner)
                'customer_name'  => $student->name,      // The Student
                'customer_email' => $student->email,     // Used for JIT Client creation
                'amount'         => $totalAmount,
                'description'    => $description,
                'external_id'    => $student->id,        // The MindByte Student UUID
            ];

            // 2. Make the secure API call
            $response = Http::withHeaders([
                'X-Sync-Token' => config('services.sync_invoice.token'),
                'Accept'       => 'application/json',
            ])
            ->timeout(10) // Don't let a slow API hang your Stripe controller
            ->post(config('services.sync_invoice.url') . '/api/v1/external-invoice', $payload);
            Log::info("Invoice Sync Status: " . $response->status());
            // 3. Log results for debugging
            if ($response->successful()) {
                Log::info("SyncInvoice: Successfully synced invoice for Student {$student->id} to Teacher {$teacherUuid}");
            } else {
                Log::error("SyncInvoice: API rejected request.", [
                    'status' => $response->status(),
                    'body'   => $response->json()
                ]);
            }

        } catch (Exception $e) {
            // This prevents the Student's "Success" page from crashing if SyncInvoice is offline
            Log::critical("SyncInvoice: Service connection failed.", [
                'message' => $e->getMessage()
            ]);
        }
    }
    public function provisionTeacher(User $user, string $password): void
    {
        Log::info("Service: Received user " . $user->email);

        try {
            $response = Http::withHeaders([
                'X-Sync-Token' => config('services.sync_invoice.token'),
                'Accept'       => 'application/json',
            ])->post(config('services.sync_invoice.url') . '/api/v1/provision-teacher', [
                'name'  => $user->name,
                'email' => $user->email,
                'password' => $password,
                'password_confirmation' => $password
            ]);

            Log::info("Service: API Status: " . $response->status());

            if ($response->successful()) {
                $uuid = $response->json('data.id');
                Log::info("Service: Received UUID: " . $uuid);
                
                // Important: Use direct update to verify database write
                $user->sync_invoice_id = $uuid;
                $user->save(); 
                
                Log::info("Service: Database updated for " . $user->email);
            } else {
                Log::error("Service: SyncInvoice error: " . $response->body());
            }
        } catch (\Exception $e) {
            Log::error("Service: Critical exception: " . $e->getMessage());
        }
    }
}