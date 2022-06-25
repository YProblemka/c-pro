<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\JsonResponse;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(["message" => "success", "response" => Setting::all()], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Setting $setting
     * @return JsonResponse
     */
    public function show(Setting $setting): JsonResponse
    {
        return response()->json(["message" => "success", "response" => $setting], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SettingRequest $request
     * @param Setting $setting
     * @return JsonResponse
     */
    public function update(SettingRequest $request, Setting $setting): JsonResponse
    {
        $setting->value = $request->getValue();

        $setting->save();

        return response()->json(["message" => "success", "response" => $setting], 200);
    }
}
