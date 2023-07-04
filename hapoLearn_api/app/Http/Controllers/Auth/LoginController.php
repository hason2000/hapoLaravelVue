<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
    }

    public function login(LoginRequest $request)
    {
        $data = [
            'username' => $request['login_username'],
            'password' => $request['login_password']
        ];

        if (Auth::attempt($data, isset($request['remember_token']) ? true : false)) {
            return redirect(url()->previous());
        } else {
            return redirect()->back()->withError('sai username hoặc password!!!')->with('dataError', $data);
        }
    }

    public function logout(Request $request)
    {
        if (url()->previous() == route('users.show', Auth::id())) {
            Auth::logout();
            return redirect()->route('home');
        }

        Auth::logout();
        return redirect()->back();
    }
}
