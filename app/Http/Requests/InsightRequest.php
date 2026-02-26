<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsightRequest extends FormRequest
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
            'cliente' => 'required|string|max:255',
            'canal' => 'required|in:email,phone,chat',
            'sentimento' => 'required|in:positivo,negativo,neutro',
            'problema' => 'required|string|max:255',
            'status' => 'required|in:aberto,em_andamento,fechado',
        ];
    }
}
