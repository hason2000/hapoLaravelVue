@extends('layouts.app')

@section('content')
    <div class="form-reset">
        @if (session('timeoutToken'))
            <div class="timeoutToken active">
            </div>
        @endif
        <div class="form-reset-content">
            <div class="form-reset-title text-center">Form Reset Password</div>
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" disabled>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password_reset">
                    @if($errors->first('password_reset'))
                    <div class="alert alert-dark alert-custom" role="alert">
                        {{ $errors->first('password_reset') }}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="rppassword">Repeat Password:</label>
                    <input type="password" class="form-control" id="rppassword" name="confirm_password_reset">
                    @if($errors->first('confirm_password_reset'))
                    <div class="alert alert-dark alert-custom" role="alert">
                        {{ $errors->first('confirm_password_reset') }}
                    </div>
                    @endif
                </div>
                <div class="text-center">
                    <button type="submit">REGISTER</button>
                </div>
            </form>
        </div>
    </div>
@endsection
