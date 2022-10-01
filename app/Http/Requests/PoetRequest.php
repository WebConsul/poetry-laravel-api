<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PoetRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $max = \DB::table('poets')->count();

        return [
            'per_page' => "nullable|numeric|integer|between:1,$max",
            'page' => "nullable|numeric|integer|between:1,$max",
        ];
    }

    public function messages(): array
    {
        return [
            'numeric' => 'The :attribute is not a number.',
            'integer' => 'The :attribute is not an integer',
            'between' => 'The :attribute value :input is not between :min - :max.',
        ];
    }
}
