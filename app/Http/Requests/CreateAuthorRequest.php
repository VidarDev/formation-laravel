<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CreateAuthorRequest extends FormRequest
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
        // dd([$this->input('lastname'),$this->input('firstname'),$this->input('email'),$this->input('slug'),$this->input('description')]);
        return [
            'lastname' => ['required', 'min:1', 'max:40'],
            'firstname' => ['required', 'min:1', 'max:40'],
            'slug' => ['required', 'min:8', 'regex:/^[\w-]+-[\w-]+$/', Rule::unique('authors')->ignore($this->route()->parameter('author'))],
            'email' => ['required', 'min:8', 'regex:/^([a-z0-9+-]+)(.[a-z0-9+-]+)*@([a-z0-9-]+.)+[a-z]{2,6}$/', Rule::unique('authors')->ignore($this->route()->parameter('author'))],
            'description' => ['required']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => $this->input('slug') ?: Str::slug($this->input('lastname').'-'.$this->input('firstname'))
        ]);
    }
}
