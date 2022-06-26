<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function loginPage(Request $request)
    {
        if (Auth::guard("admin")->check()) {
            return redirect(route("admin.settings"));
        }
        return view("admin.login");
    }

    public function login(Request $request)
    {
        $data = $request->only(["login", "password"]);
        if (!auth()->guard("admin")->attempt($data, true)) {
            return redirect(route("admin.login"))->withErrors([
                "login" => "Неправильные данные"
            ]);
        }
        return redirect(route("admin.settings"));
    }

    public function logout()
    {
        Auth::guard("admin")->logout();

        return redirect(route("index"));
    }
}
