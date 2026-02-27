<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\CanalEnum;
use App\Enums\SentimentoEnum;
use App\Enums\RiscoEnum;
use App\Enums\StatusEnum;

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
            'canal' => ['required', Rule::enum(CanalEnum::class)],
            'sentimento' => [Rule::enum(SentimentoEnum::class)],
            'risco' => [Rule::enum(RiscoEnum::class)],
            'problema' => 'required|string|max:255',
            'status' => ['required', Rule::enum(StatusEnum::class)],
        ];
    }
}
