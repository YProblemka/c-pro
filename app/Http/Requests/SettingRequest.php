<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
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
     * @return array
     */
    public function rules(): array
    {
        return [
            "name" => "required|string|min:3|max:60",
            "value" => "required|string|min:3|max:60"
        ];
    }

    public function getName()
    {
        return $this->input("name");
    }

    public function getValue()
    {
        return $this->input("value");
    }
}
