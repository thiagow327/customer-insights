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
            'canal' => 'required|Rule::enum(App\Enums\CanalEnum::class)',
            'sentimento' => 'required|Rule::enum(App\Enums\SentimentoEnum::class)',
            'risco' => 'required|Rule::enum(App\Enums\RiscoEnum::class)',
            'problema' => 'required|string|max:255',
            'status' => 'required|Rule::enum(App\Enums\StatusEnum::class)',
        ];
    }
}
