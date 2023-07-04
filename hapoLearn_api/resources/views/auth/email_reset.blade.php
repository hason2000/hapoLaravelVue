@extends('layouts.app')

@section('content')
    <div class="resetpassword d-flex justify-content-center">
        <div class="resetpassword-content">
            <div class="resetpassword-title text-center">Reset Password</div>
            <p class="text-center">Enter email to reset your password</p>
            @if ($errors->first('email_reset'))
                <div class="alert alert-warning" role="alert">
                    {{ $errors->first('email_reset') }}
                </div>
            @endif
            @if (session('email_error'))
            <div class="alert alert-warning" role="alert">
                {{ session('email_error') }}
            </div>
            @endif
            @if (isset($notifySuccess))
            <div class="alert alert-success" role="alert">
                {{ $notifySuccess }}
            </div>
            @endif
            <form action="{{ route('password.email') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input class="form-control" type="email" id="email" name="email_reset" value="{{ session('email_error') ? $data : '' }}">
                </div>
                <div class="w-100 text-center">
                    <button type="submit" class="resetpassword-btn">RESET PASSWORD</button>
                </div>
            </form>
        </div>
    </div>
@endsection