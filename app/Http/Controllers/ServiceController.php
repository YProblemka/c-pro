<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostImgAddRequest;
use App\Http\Requests\PostImgDelRequest;
use App\Http\Requests\ServiceRequest;
use App\Models\Post_Img;
use App\Models\Service;
use Illuminate\Http\JsonResponse;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
         return response()->json(["message" => "success", "response" => Service::all()], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ServiceRequest $request
     * @return JsonResponse
     */
    public function store(ServiceRequest $request): JsonResponse
    {
        $service = Service::query()->make(
            [
                "name" => $request->getName(),
                "text" => $request->getText(),
                "img_src" => Service::saveImg($request->getImg()),
            ]
        );
        $service->save();
        return response()->json(["message" => "success", "response" => $service], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Service $service
     * @return JsonResponse
     */
    public function show(Service $service): JsonResponse
    {
        return response()->json(["message" => "success", "response" => $service], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ServiceRequest $request
     * @param Service $service
     * @return JsonResponse
     */
    public function update(ServiceRequest $request, Service $service): JsonResponse
    {
        $service->name = $request->getName();
        $service->text = $request->getText();
        $service->img_src = Service::saveImg($request->getImg());

        $service->save();

        return response()->json(["message" => "success", "response" => $service], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Service $service
     * @return JsonResponse
     */
    public function destroy(Service $service): JsonResponse
    {
        $result = $service->delete();
        return response()->json(["message" => $result ? "success" : "error"], $result ? 200 : 500);
    }

    /**
     * Store a newly created resource in storage.
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
     * Store a newly created resource in storage.
     *
     * @param PostImgDelRequest $request
     * @return JsonResponse
     */
    public function delImg(PostImgDelRequest $request): JsonResponse
    {
        $post_img = Post_Img::getById($request->getId());
        $result = $post_img->delete();
        return response()->json(["message" => $result ? "success" : "error"], $result ? 200 : 500);
    }
}
