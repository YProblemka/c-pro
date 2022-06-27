<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Mail\FeedbackMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendCustom(MailRequest $request): \Illuminate\Http\JsonResponse
    {
        Mail::to(config("app.app_mail"))
            ->send(new FeedbackMail($request->getEmail(), $request->getText()));
        return response()->json(["message" => "success"], 200);
    }
}
