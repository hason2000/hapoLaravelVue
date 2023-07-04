<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Http\Requests\EmailRequest;
use App\Models\PasswordReset;
use App\Models\User;
use App\Notifications\ResetPassword;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{

    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        return view('auth.email_reset');
    }

    public function sendResetLinkEmail(EmailRequest $request)
    {
        $user = User::getUserByEmail($request['email_reset']);

        if (is_null($user)) {
            $data = $request->all()['email_reset'];
            session()->flash('email_error', 'email không tồn tại!!');
            return view('auth.email_reset', compact('data'));
        }

        $passwordReset = PasswordReset::updateOrCreate(
            [
                'email' => $request['email_reset']
            ],
            [
                'token' => Str::random(255),
                'created_at' => Carbon::now()
            ]
        );

        $user->notify(new ResetPassword($passwordReset->token));

        $notifySuccess = 'Hệ thống đã gửi mail đến bạn, vui lòng kiểm tra';
        return view('auth.email_reset', compact('notifySuccess'));
    }
}
