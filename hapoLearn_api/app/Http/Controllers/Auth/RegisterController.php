<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->all());
        if ($user) {
            Auth::login($user);
            return redirect(url()->previous());
        } else {
            return redirect()->back();
        }
    }
}
