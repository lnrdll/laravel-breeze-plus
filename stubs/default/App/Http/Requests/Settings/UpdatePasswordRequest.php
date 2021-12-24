<?php

namespace App\Http\Requests\Settings;

use App\Rules\CurrentPasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     */
    public function rules(): array
    {
        return [
            'password' => ['required', 'confirmed'],
            'current_password' => ['required', new CurrentPasswordRule],
        ];
    }
}
