<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleManagementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // default rules for create
        $rules = [
            'name' => ['required', 'string', 'max:128'],
        ];

        // override rules for edit
        if ($this->isMethod('PATCH')) {
            $rules['email'] = ['required', 'email', 'max:128', Rule::unique('users', 'email')->ignore($this->userId, 'id')];
            $rules['password'] = ['nullable', 'min:8', 'max:128', 'confirmed'];
        }

        return $rules;
    }
}
