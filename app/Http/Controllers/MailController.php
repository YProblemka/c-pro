<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Mail\FeedbackMail;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendCustom(MailRequest $request): Limit
    {
        Mail::to(config("app.app_mail"))
            ->send(new FeedbackMail($request->getEmail(), $request->getText()));
        return Limit::perMinute(2)->response(function () {
            return response()->json(["message" => "success"], 200);
        });
    }
}
