<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            "title" => "required|string|min:3|max:60",
            "date" => "required|date"
        ];
    }

    public function getTitle()
    {
        return $this->input("title");
    }

    public function getDate()
    {
        return $this->input("date");
    }

}
