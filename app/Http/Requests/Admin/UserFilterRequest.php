<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin;

use App\Enums\Roles;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\Enum;

final class UserFilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('access-admin-panel');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'role' => ['nullable', new Enum(Roles::class)],
            'status' => ['nullable', 'in:active,inactive'],
        ];
    }

    public function filters(): array
    {
        return [
            'role' => $this->input('role'),
            'status' => $this->input('status'),
        ];
    }
}
