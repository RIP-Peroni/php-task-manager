<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TaskFormRequest extends FormRequest
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
        if ($this->routeIs('tasks.update')) {
            $nameRule = ['required', 'unique:tasks,name,' . $this->task->id];
        } else {
            $nameRule = ['required', 'unique:tasks'];
        }
        return [
            'name' => $nameRule,
            'description' => ['nullable', 'string'],
            'status_id' => ['required'],
            'assigned_to_id' => ['nullable', 'integer'],
            'labels' => ['nullable', 'array']
        ];
    }
}
