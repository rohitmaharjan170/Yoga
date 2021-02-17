<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="/plugins/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/plugins/owlcarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register</title>
</head>
<body>

<div class="container login-logout" id="container" style="margin-top:3rem; margin-bottom:3rem;">
    <div class="form-container sign-up-container">
        <form method="POST" action="{{ route('register') }}" id="form">
            @csrf
            <h3>Create Account</h3>
            <div class="social-container">
                <a href="{{ Route('social', 'facebook') }}" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="{{ Route('social', 'google') }}" class="social"><i class="fab fa-google-plus-g"></i></a>
            </div>


            <input id="name" type="text" class="form-control input-sm  @error('name') is-invalid @enderror"
                   placeholder="Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input id="email" type="email" class="form-control input-sm  @error('email') is-invalid @enderror  mt-3"
                   placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input id="password" type="password" placeholder="Enter Password"
                   class="form-control input-sm mt-3 @error('password') is-invalid @enderror" name="password" required
                   autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror


            <input id="password-confirm" type="password" class="form-control input-sm  mt-3"
                   placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">

            <button type="submit" class="signup-btn m-4" id="sign"> {{ __('Sign Up') }}</button>

        </form>
    </div>
    <div class="form-container sign-in-container">
        <form method="POST" action="{{ route('login') }}" id="form">
            @csrf
            <h1>Sign in</h1>
            @if(Session::has('VerificatiionError'))
                <p class="alert alert-info"
                   style="background-color: rgb(54, 173, 152)!important;">{{ Session::get('VerificatiionError') }}</p>
            @endif
            @if(Session::has('CredentialError'))
                <p class="alert alert-danger">{{ Session::get('CredentialError') }}</p>
            @endif
            @if (\Illuminate\Support\Facades\Session::has('resetmsg'))
                <div class="alert alert-success" role="alert">
                    {{\Illuminate\Support\Facades\Session::get('resetmsg')}}
                </div>
            @endif
            <div class="social-container">
                <a href="{{ Route('social', 'facebook') }}" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="{{ Route('social', 'google') }}" class="social"><i class="fab fa-google-plus-g"></i></a>
            </div>
            <span>or use your account</span>
            <input id="email" type="email" placeholder="Email"
                   class="form-control  mt-2 @error('email') is-invalid @enderror" name="email"
                   value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
            @enderror
            <input id="password" type="password" placeholder="Password"
                   class="form-control mb-4 mt-3 @error('password') is-invalid @enderror" name="password" required
                   autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
            @enderror


            {{-- <a class="btn btn-link" href="{{ Route('social', 'google') }}">Google</a> --}}

            @if (Route::has('passwordreset'))
                <a class="btn btn-link" href="{{ route('passwordreset') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
            <button type="submit" id="sign" class="btn btn-primary">
                {{ __('Login') }}
            </button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello, Friend!</h1>
                <p>Enter your personal details and start journey with us</p>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>


{{-- mobile sizwe ma --}}
<div class="login-logout-sano">

    <div class="card sign-up-container-sano m-4 py-4" align="center" id="sign-up-container-sano">
        <form method="POST" action="{{ route('register') }}" id="form">
            @csrf
            <h3>Create Account</h3>
            <div class="social-container">
                <a href="{{ Route('social', 'facebook') }}" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="{{ Route('social', 'google') }}" class="social"><i class="fab fa-google-plus-g"></i></a>
            </div>

            <input id="name" type="text" class="form-control input-sm  @error('name') is-invalid @enderror"
                   placeholder="Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
            <input id="email" type="email" class="form-control input-sm  mt-3  @error('email') is-invalid @enderror"
                   placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror

            <input id="password" type="password" placeholder="Enter Password"
                   class="form-control mt-3 input-sm @error('password') is-invalid @enderror" name="password" required
                   autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror

            <input id="password-confirm" type="password" class="form-control input-sm mb-4  mt-3"
                   placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">

            Already registered? <span><a href="#sign-in-container-sano" class="sign-in-jau mt-2">Sign In Here</a></span>
            <button type="submit" class="signup-btn my-2" id="sign"> {{ __('Sign Up') }}</button>

        </form>
    </div>


    <div class="card sign-in-container-sano m-4 py-4" align="center" id="sign-in-container-sano">
        <form method="POST" action="{{ route('login') }}" id="form">
            @csrf
            <h1>Sign in</h1>
            @if(Session::has('VerificatiionError'))
                <p class="alert alert-info"
                   style="background-color: rgb(54, 173, 152)!important;">{{ Session::get('VerificatiionError') }}</p>
            @endif
            @if(Session::has('CredentialError'))
                <p class="alert alert-danger">{{ Session::get('CredentialError') }}</p>
            @endif
            @if (\Illuminate\Support\Facades\Session::has('resetmsg'))
                <div class="alert alert-success" role="alert">
                    {{\Illuminate\Support\Facades\Session::get('resetmsg')}}
                </div>
            @endif
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
            </div>
            <span>or use your account</span>

            <input id="email" type="email" placeholder="Email"
                   class="form-control mt-2 @error('email') is-invalid @enderror" name="email"
                   value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
            @enderror
            <input id="password" type="password" placeholder="Password"
                   class="form-control mb-4 mt-3 @error('password') is-invalid @enderror" name="password" required
                   autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
            @enderror

            Haven't register? <span><a href="#sign-up-container-sano" class="sign-in-jau my-2">Sign Up Here</a></span>


            <button type="submit" id="sign" class="btn btn-primary my-2">
                {{ __('Login') }}
            </button>

            @if (Route::has('passwordreset'))
                <a class="btn btn-link" href="{{ route('passwordreset') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </form>
    </div>
</div>


<style>
    @media (min-width: 774px) {
        .login-logout-sano {
            display: none;
        }
    }

    @media (max-width: 775px) {
        .login-logout {
            display: none;
        }
    }

    .second-login-logout {
        text-align: center;
        padding: auto;
        margin: auto;
        height: 480px;
        border: 1px solid black;
        width: 400px;

    }

    .login-logout {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        position: relative;
        overflow: hidden;
        width: 768px;
        max-width: 100%;
        min-height: 480px;
        top: 10%;
    }

    .form-container span {
        font-size: 13px;
    }

    .form-container {
        position: absolute;
        top: 0;
        height: 100%;
        transition: all 0.6s ease-in-out;
    }

    .sign-up-container {
        left: 0;
        width: 50%;
        z-index: 2;
    }

    .sign-in-container {
        left: 0;
        width: 50%;
        opacity: 0;
        z-index: 1;
    }

    .login-logout.right-panel-active .sign-up-container {
        transform: translateX(100%);
    }

    .login-logout.right-panel-active .sign-in-container {
        transform: translateX(100%);
        opacity: 1;
        z-index: 5;
        animation: show 0.6s;
    }

    @keyframes show {
        0%,
        49.99% {
            opacity: 0;
            z-index: 1;
        }

        50%,
        100% {
            opacity: 1;
            z-index: 5;
        }
    }

    .overlay-container {
        position: absolute;
        top: 0;
        left: 50%;
        width: 50%;
        height: 100%;
        overflow: hidden;
        transition: transform 0.6s ease-in-out;
        z-index: 100;
    }

    .login-logout.right-panel-active .overlay-container {
        transform: translateX(-100%);
    }

    .overlay {
        background-image: linear-gradient(to right top, #0ff5ca, #0ec9a7, #0f9e84, #107563, #0e4f43);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 0 0;
        color: #ffffff;
        position: relative;
        left: -100%;
        height: 100%;
        width: 200%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
    }

    .login-logout.right-panel-active .overlay {
        transform: translateX(50%);
    }

    .overlay-panel {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 40px;
        text-align: center;
        top: 0;
        height: 100%;
        width: 50%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
    }

    .overlay-right {
        transform: translateX(-20%);
    }

    .login-logout.right-panel-active .overlay-right {
        transform: translateX(0);
    }

    .overlay-left {
        right: 0;
        transform: translateX(0);
    }

    .login-logout.right-panel-active .overlay-left {
        transform: translateX(20%);
    }

    .overlay-panel p {
        font-size: 14px;
        font-weight: 100;
        line-height: 20px;
        letter-spacing: 0.5px;
        margin: 20px 0 30px;
    }

    .forgot {
        color: #333;
        font-size: 14px;
        text-decoration: none;
        margin: 15px 0;
    }

    .social {
        color: #333;
        font-size: 14px;
        text-decoration: none;
        margin: 15px 0;
    }

    #sign {
        border-radius: 20px;
        border: 1px solid #fff;

        color: #ffffff;
        font-size: 12px;
        font-weight: bold;
        padding: 12px 45px;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: transform 80ms ease-in;
    }

    #sign {
        background-color: #36ad98;
    }

    #sign:active {
        transform: scale(0.95);
    }

    #sign:focus {
        outline: none;
    }

    .ghost {
        border-radius: 20px;
        border: 1px solid #fff;

        color: #ffffff;
        font-size: 12px;
        font-weight: bold;
        padding: 12px 45px;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: transform 80ms ease-in;
        background-color: transparent;
        border-color: #ffffff;
    }

    #form {
        background-color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 50px;
        height: 100%;
        text-align: center;
    }

    .sign-box {
        background-color: #eee;
        border: none;
        padding: 12px 15px;
        margin: 8px 0;
        width: 100%;
    }

    .social-container {
        margin: 20px 0;
    }

    .social-container a {
        border: 1px solid #dddddd;
        border-radius: 50%;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        margin: 0 5px;
        height: 40px;
        width: 40px;
    }
</style>


<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signInButton.addEventListener('click', () => {
        container.classList.add('right-panel-active');
    });

    signUpButton.addEventListener('click', () => {
        container.classList.remove('right-panel-active');
    });
</script>


</body>
</html>
