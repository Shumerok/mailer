<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'mail_from' => 'required|string|email|max:255',
            'mail_to' => 'required|string|email|max:255',
            'mail_copy' => 'nullable|string|email|max:255',
            'subject' => 'required|string|max:255',
            'type' => 'required|string|in:text,html',
            'body' => 'required|filled'
        ];
    }
}
