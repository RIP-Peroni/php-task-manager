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
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->routeIs('labels.update')) {
            $nameRule = ['required', 'unique:labels,name,' . $this->label->id];
        } else {
            $nameRule = ['required', 'unique:labels'];
        }
        return [
            'name' => $nameRule,
            'description' => ['nullable', 'string'],
        ];
    }
}
