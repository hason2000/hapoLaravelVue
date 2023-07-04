<div class="modal fade" id="loginRegisterModal" tabindex="-1" aria-labelledby="loginRegisterModal" aria-hidden="true">
    <div class="d-flex justify-content-center">
        <div class="form-rl-header">
            <div class="modal-header-custom">
                <p class="modal-header-l modal-active-cus">LOGIN</p>
                <P class="modal-header-r">REGISTER</P>
            </div>
            <form class="form-r d-none @if($errors->first('username') || $errors->first('password') || $errors->first('confirm_password') || $errors->first('email')) form-r-err  @endif" action="{{ route('register') }} " method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
                    @if($errors->first('username'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('username') }}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    @if($errors->first('email'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('email') }}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="passwordr">Password:</label>
                    <input type="password" class="form-control" id="passwordr" name="password" value="{{ old('password') }}">
                    @if($errors->first('password'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('password') }}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="rppassword">Repeat Password:</label>
                    <input type="password" class="form-control" id="rppassword" name="confirm_password" value="{{ old('confirm_password') }}">
                    @if($errors->first('confirm_password'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('confirm_password') }}
                    </div>
                    @endif
                </div>
                <div class="text-center">
                    <button type="submit">REGISTER</button>
                </div>
            </form>
            <form class="form-l d-block @if($errors->first('login_username') || $errors->first('login_password') || session('error')) form-l-err @endif @if (session('require_login'))
                form-l-require
            @endif" action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="usernamel">Username:</label>
                    @if (session('dataError'))
                        <input type="text" class="form-control" id="usernamel" name="login_username" value="{{ session('dataError')['username'] }}">
                    @else
                        <input type="text" class="form-control" id="usernamel" name="login_username" value="{{ old('login_username') }}">
                    @endif
                    @if($errors->first('login_username'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('login_username') }}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="passwordl">Password:</label>
                    @if (session('dataError'))
                        <input type="password" class="form-control" id="passwordl" name="login_password" value="{{ session('dataError')['password'] }}">
                    @else
                        <input type="password" class="form-control" id="passwordl" name="login_password" value="{{ old('login_password') }}">
                    @endif
                    @if($errors->first('login_password'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('login_password') }}
                    </div>
                    @endif
                </div>
                <div class="form-group form-check d-flex justify-content-between">
                    <div>
                        <input type="checkbox" class="form-check-input" id="rememberl" name="remember_token" value="remember_token">
                        <label class="form-check-label" for="rememberl">Remember me</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="">Forgot Password</a>
                </div>
                @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
                @endif
                <div class="text-center">
                    <button type="submit">LOGIN</button>
                </div>
                <div class="loginwith-text">Login with</div>
                <div class="login-google d-flex justify-content-center">
                    <div class="d-flex align-items-center">
                        <i class="fab fa-google-plus-g"></i>
                        <span>Google</span>
                    </div>
                </div>
                <div class="login-facebook d-flex justify-content-center align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="fab fa-facebook-f"></i>
                        <span>Facebook</span>
                    </div>
                </div>
            </form>
            <div class="modal-close">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</div>
