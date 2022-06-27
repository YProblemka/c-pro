<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostImgAddRequest;
use App\Http\Requests\PostImgUpdateRequest;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Post_Img;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(["message" => "success", "response" => Post::all()], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @return JsonResponse
     */
    public function store(PostRequest $request)
    {
        $post = Post::query()->make(
            [
                "title" => $request->getTitle(),
                "date" => $request->getDate(),
            ]
        );
        $post->save();

        return response()->json(["message" => "success", "response" => $post], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return JsonResponse
     */
    public function show(Post $post): JsonResponse
    {
        return response()->json(["message" => "success", "response" => $post], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param Post $post
     * @return JsonResponse
     */
    public function update(PostRequest $request, Post $post): JsonResponse
    {
        $post->title = $request->getTitle();
        $post->date = $request->getDate();

        $post->save();

        return response()->json(["message" => "success", "response" => $post], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return JsonResponse
     */
    public function destroy(Post $post): JsonResponse
    {
        $result = $post->delete();
        return response()->json(["message" => $result ? "success" : "error"], $result ? 200 : 500);
    }

    /**
     *
     * @param PostImgAddRequest $request
     * @return JsonResponse
     */
    public function addImg(PostImgAddRequest $request): JsonResponse
    {
        $post_img = Post_Img::query()->make(
            [
                "post_id" => $request->getId(),
                "img_src" => Post_Img::saveImg($request->getImg()),
            ]
        );
        $post_img->save();
        return response()->json(["message" => "success", "response" => $post_img], 200);
    }


    /**
     *
     * @param PostImgUpdateRequest $request
     * @param Post_Img $post_img
     * @return JsonResponse
     */
    public function updateImg(PostImgUpdateRequest $request, Post_Img $post_img): JsonResponse
    {
        $post_img->img_src = Post_Img::saveImg($request->getImg());
        $post_img->save();
        return response()->json(["message" => "success", "response" => $post_img], 200);
    }

    /**
     *
     * @param Post_Img $post_img
     * @return JsonResponse
     */
    public function delImg(Post_Img $post_img): JsonResponse
    {
        $result = $post_img->delete();
        return response()->json(["message" => $result ? "success" : "error"], $result ? 200 : 500);
    }
}
