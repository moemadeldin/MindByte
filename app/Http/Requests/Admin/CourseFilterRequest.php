<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

final class CourseFilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'slug' => ['nullable', 'exists:categories,slug'],
            'is_free' => ['nullable', 'in:0,1'],
        ];
    }

    public function filters(): array
    {
        return [
            'slug' => $this->input('slug'),
            'is_free' => $this->input('is_free'),
        ];
    }
}
