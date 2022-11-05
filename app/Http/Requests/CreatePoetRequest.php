<?php

namespace App\Http\Requests;

use DB;
use Illuminate\Foundation\Http\FormRequest;

class CreatePoetRequest extends FormRequest
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
        //todo:
        // 1. вероятно поле lang должно валидироваться
        // через список разрешенных языков, он должен храниться
        // в базе данных или вшит в код через Enum?
        // 2. Поля имени поэта должны быть раздельными или одним полем full_name?
        // Если раздельными, то как быть с иностранными поэтами
        // (у них форма имени может отличаться, например отсутствием отчества)?
        // 3. Как проверяем на то что у нас такого поэта ещё нет в базе данных?
        return [
            'lang' => 'required|string|size:2',
            'full_name' => 'required|string'
        ];
    }
}
