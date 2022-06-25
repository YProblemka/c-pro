<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            "text" => "required|string|min:3|max:3000",
            "photo" => "required|file|max:10000|mimes:jpeg,jpg,png,svg,bmp,webp",
        ];
    }

    public function getName()
    {
        return $this->input("name");
    }

    public function getText()
    {
        return $this->input("text");
    }

    public function getImg()
    {
        return $this->file("photo");
    }
}
