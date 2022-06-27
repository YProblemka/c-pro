<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;

class PostImgAddRequest extends FormRequest
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
            "post_id" => "bail|required|integer|exists:" . Post::class . ",id",
            "photo" => "required|file|max:10000|mimes:jpeg,jpg,png,svg,bmp,webp",
        ];
    }

    public function getId()
    {
        return $this->input("post_id");
    }

    public function getImg()
    {
        return $this->file("photo");
    }
}
