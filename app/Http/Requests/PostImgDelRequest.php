<?php

namespace App\Http\Requests;

use App\Models\Post_Img;
use Illuminate\Foundation\Http\FormRequest;

class PostImgDelRequest extends FormRequest
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
            "id" => "bail|required|integer|exists:" . Post_Img::class . ",id",
        ];
    }

    public function getId()
    {
        return $this->input("id");
    }
}
