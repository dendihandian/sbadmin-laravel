<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Spatie\Permission\Guard;

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
            'name' => ['required', 'string', 'min:3', 'max:128', Rule::unique('roles', 'name')],
            'display_name' => ['nullable', 'string', 'min:3', 'max:128'],
        ];

        // override rules for edit
        if ($this->isMethod('PATCH')) {
            $rules['name'] = ['required', 'string', 'max:128', Rule::unique('roles', 'name')->ignore($this->roleId, 'id')];
        }

        return $rules;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'name' => isset($this->name) && !empty($this->name) ? Str::slug($this->name) : null,
            'guard_name' => $this->guard_name ?? Guard::getDefaultName(static::class),
        ]);
    }

    /**
     * @return void
     */
    public function withValidator(Validator $validator)
    {
        // if (!$validator->fails()) {
        //     $this->merge([
        //         'guard_name' => $this->guard_name ?? Guard::getDefaultName(static::class),
        //     ]);
        // }
    }
}
