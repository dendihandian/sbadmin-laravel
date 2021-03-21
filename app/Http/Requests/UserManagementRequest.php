<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserManagementRequest extends FormRequest
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
            'email' => ['required', 'email', 'max:128', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:128', 'confirmed'],
        ];

        // override rules for edit
        if ($this->isMethod('PATCH')) {
            $rules['email'] = ['required', 'email', 'max:128', Rule::unique('users', 'email')->ignore($this->userId, 'id')];
            $rules['password'] = ['nullable', 'min:8', 'max:128', 'confirmed'];
        }

        return $rules;
    }

    /**
     * @return void
     */
    public function withValidator(Validator $validator)
    {
        if (!$validator->fails()) {
            $this->merge([
                'name' => $this->name,
                'email' => $this->email,
                // 'role' => $this->role ?? null,
                'password' => !empty($this->password) ? Hash::make($this->password) : null,
            ]);
        }

        if ($this->has('password') && empty($this->password)) {
            $this->request->remove('password');
        }

        if ($this->has('password_confirmation') && empty($this->password_confirmation)) {
            $this->request->remove('password_confirmation');
        }
    }

}
