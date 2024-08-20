<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StringToNumberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'string' => 'required|string|max:32',
        ];
    }
}
