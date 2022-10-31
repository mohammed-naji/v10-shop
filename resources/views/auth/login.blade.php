{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email or Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: sans-serif;
        }

        a {
            color: #666;
            font-size: 14px;
            /* display: block; */
        }

        .login-title {
            text-align: center;
        }

        #login-page {
            display: flex;
        }

        .notice {
            font-size: 13px;
            text-align: center;
            color: #666;
        }

        .login {
            width: 30%;
            height: 100vh;
            background: #FFF;
            padding: 70px;
        }

        .login a {
            margin-top: 25px;
            text-align: center;
        }

        .form-login {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            align-content: center;
        }

        .form-login label {
            text-align: left;
            font-size: 13px;
            margin-top: 10px;
            margin-left: 20px;
            display: block;
            color: #666;
        }

        .input-email,
        .input-password {
            width: 100%;
            background: #ededed;
            border-radius: 25px;
            margin: 4px 0 6px 0;
            padding: 10px;
            display: flex;
        }

        .icon {
            padding: 4px;
            color: #666;
            min-width: 30px;
            text-align: center;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            border: 0;
            background: none;
            font-size: 16px;
            padding: 4px 0;
            outline: none;
        }

        button[type="submit"] {
            width: 100%;
            border: 0;
            border-radius: 25px;
            padding: 14px;
            background: #008552;
            color: #FFF;
            display: inline-block;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
            transition: ease all 0.3s;
        }

        button[type="submit"]:hover {
            opacity: 0.9;
        }

        .background {
            width: 70%;
            padding: 40px;
            height: 100vh;
            background: linear-gradient(60deg, rgba(158, 189, 19, 0.5), rgba(0, 133, 82, 0.7)), url('https://cdn.pixabay.com/photo/2016/03/09/09/22/workplace-1245776_960_720.jpg') center no-repeat;
            background-size: cover;
            display: flex;
            flex-wrap: wrap;
            align-items: flex-end;
            justify-content: flex-end;
            align-content: center;
            flex-direction: row;
        }

        .background h1 {
            max-width: 420px;
            color: #FFF;
            text-align: right;
            padding: 0;
            margin: 0;
        }

        .background p {
            max-width: 650px;
            color: #1a1a1a;
            font-size: 15px;
            text-align: right;
            padding: 0;
            margin: 15px 0 0 0;
        }

        .created {
            margin-top: 40px;
            text-align: center;
        }

        .created p {
            font-size: 13px;
            font-weight: bold;
            color: #008552;
        }

        .created a {
            color: #666;
            font-weight: normal;
            text-decoration: none;
            margin-top: 0;
        }

        .checkbox label {
            display: inline;
            margin: 0;
        }
    </style>
</head>

<body>
    <div id="login-page">
        <div class="login">
            <h2 class="login-title">Login</h2>
            <p class="notice">Please login to access the system</p>
            <form class="form-login" method="POST" action="{{ route('login') }}">
                @csrf
                <label for="email">E-mail</label>
                <div class="input-email">
                    <i class="fas fa-envelope icon"></i>
                    <input type="email" name="email" placeholder="Enter your e-mail" required>

                </div>
                @error('email')
                        <small style="color: red;font-size:12px;margin-left:15px" class="invalid-feedback" role="alert">
                            {{ $message }}
                        </small>
                    @enderror
                <label for="password">Password</label>
                <div class="input-password">
                    <i class="fas fa-lock icon"></i>
                    <input type="password" name="password" placeholder="Enter your password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="checkbox">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <button type="submit"><i class="fas fa-door-open"></i> Sign in</button>
            </form>
            <br>
            <div>
                @if (Route::has('register'))
                <a href="{{ route('register') }}">Create New Account</a> or
                @endif
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
            </div>
        </div>
        <div class="background">
            <h1>Donec in dapibus augue sed nisi nunc suscipit eget enim sit amet</h1>
        </div>
    </div>
</body>

</html>
