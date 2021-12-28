<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     */
    public function authorize(): bool
    {
        if (! hash_equals(
            (string) $this->route('id'),
            (string) $this->user()->getKey()
        )) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     */
    public function rules(): array
    {
        return [
            'email' => ['sometimes', 'required', 'string', 'email:rfc,dns', 'unique:users,email']
        ];
    }
}
