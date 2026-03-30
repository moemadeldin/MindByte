<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

final class BillingSyncService
{
    public function sync($student, iterable $items, string $teacherUuid): void
    {
        Log::info("Syncing Invoice: Student {$student->email} -> Teacher UUID {$teacherUuid}");
        try {
            $totalAmount = collect($items)->sum('price');
            $description = "Course(s): " . collect($items)->pluck('name')->implode(', ');

            $payload = [
                'user_id'        => $teacherUuid,
                'customer_name'  => $student->name,
                'customer_email' => $student->email, 
                'customer_company' => $student->company ?? config('app.name'), 
                'amount'         => $totalAmount,
                'description'    => $description,
                'external_id'    => $student->id,
            ];

            $response = Http::withHeaders([
                'X-Sync-Token' => config('services.sync_invoice.token'),
                'Accept'       => 'application/json',
            ])
            ->timeout(10)
            ->post(config('services.sync_invoice.url') . '/api/v1/external-invoice', $payload);
            Log::info("Invoice Sync Status: " . $response->status());
            if ($response->successful()) {
                Log::info("SyncInvoice: Successfully synced invoice for Student {$student->id} to Teacher {$teacherUuid}");
            } else {
                Log::error("SyncInvoice: API rejected request.", [
                    'status' => $response->status(),
                    'body'   => $response->json()
                ]);
            }

        } catch (Exception $e) {
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