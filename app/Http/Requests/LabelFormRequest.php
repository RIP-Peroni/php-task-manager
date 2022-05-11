<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LabelFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function messages(): array
    {
        return [
            'unique' => __(
                'validation.The attribute name has already been taken',
                ['attribute' => 'label', 'атрибут' => 'метка']
            ),
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $nameRule = $this->routeIs('labels.update')
            ? ['required', 'unique:labels,name,' . $this->label->id]
            : ['required', 'unique:labels'];
        return [
            'name' => $nameRule,
            'description' => ['nullable', 'string'],
        ];
    }
}
