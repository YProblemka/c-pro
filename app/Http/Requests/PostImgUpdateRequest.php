<?php

namespace App\Http\Requests;

use App\Models\Post_Img;
use Illuminate\Foundation\Http\FormRequest;

class PostImgUpdateRequest extends FormRequest
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
            "photo" => "required|file|max:10000|mimes:jpeg,jpg,png,svg,bmp,webp",
        ];
    }

     public function getImg()
    {
        return $this->file("photo");
    }
}
