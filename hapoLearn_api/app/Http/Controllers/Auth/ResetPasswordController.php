<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetRequest;
use App\Models\PasswordReset;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function showResetForm(Request $request, $token)
    {
        $passwordReset = PasswordReset::getPasswordResetByToken($token);

        if (is_null($passwordReset)) {
            return 'Khâu xác thực không hợp lệ';
        }

        $user = User::getUserByEmail($passwordReset->email);
        return view('auth.form_reset', compact('user'));
    }

    public function reset(ResetRequest $request)
    {
        $token = str_replace("http://127.0.0.1:8000/password/reset/", "", url()->previous());
        $passwordReset = PasswordReset::getPasswordResetByToken($token);
        
        if (!$passwordReset->checkTimeValidateToken()) {
            session()->flash('timeoutToken', 'Token đã hết hạn');
            return redirect()->back();
        }
        
        $user = User::getUserByEmail($passwordReset->email);
        
        $data = [
            'password' => $request['password_reset']
        ];

        $user->update($data);
        Auth::login($user);
        return redirect()->route('home');
    }
}
