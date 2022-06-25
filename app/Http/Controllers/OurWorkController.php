<?php

namespace App\Http\Controllers;

use App\Http\Requests\OurWorkRequest;
use App\Models\OurWork;
use Illuminate\Http\JsonResponse;

class OurWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(["message" => "success", "response" => OurWork::all()], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param OurWork $ourWork
     * @return JsonResponse
     */
    public function show(OurWork $ourWork): JsonResponse
    {
        return response()->json(["message" => "success", "response" => $ourWork], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OurWorkRequest $request
     * @param OurWork $ourWork
     * @return JsonResponse
     */
    public function update(OurWorkRequest $request, OurWork $ourWork): JsonResponse
    {
        $ourWork->img_src = OurWork::saveImg($request->getImg());

        $ourWork->save();

        return response()->json(["message" => "success", "response" => $ourWork], 200);
    }

}
