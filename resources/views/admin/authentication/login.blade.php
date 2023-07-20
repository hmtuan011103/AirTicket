<!doctype html>
<html lang="en">
<head>
    <title>Login By Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/css/login/style.css" rel="stylesheet" />
</head>
<body>
<section class="ftco-section">
    <div class="container">
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-6 text-center mb-5">--}}
{{--                <h2 class="heading-section">Admin Air Ticket</h2>--}}
{{--            </div>--}}
{{--        </div>--}}
        @if(session('error'))
            <div class="">
                <p class="font-bold">Error!</p>
                <p>{{ session('error') }}</p>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="login-wrap py-5">
                    <div class="img d-flex align-items-center justify-content-center" style="background-image: url({{ asset('assets/img/logo-login.png')  }}); width: 220px;">

                    </div>
                    <h3 class="text-center mb-0">Welcome</h3>
                    <p class="text-center">Sign in by entering the information below</p>
                    <form action="{{ route('admin-auth.store') }}" class="login-form" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
                            <input type="email" class="form-control @error('file_upload') is-invalid @enderror" autocomplete="off" placeholder="Username" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="alert text-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
                            <input type="password" class="form-control @error('file_upload') is-invalid @enderror" placeholder="Password" name="password">
                            @error('password')
                                <div class="alert text-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group d-md-flex justify-content-between justify-content-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" value="" id="remember">
                                <label class="text-md-right" for="remember" style="color: #b689b0;">
                                    Remember Me?
                                </label>
                            </div>
                            <div class="text-md-right">
                                <a href="#">Forgot Password</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn form-control btn-primary rounded submit px-3">Login</button>
                        </div>
                    </form>
{{--                    <div class="w-100 text-center mt-4 text">--}}
{{--                        <p class="mb-0">Don't have an account?</p>--}}
{{--                        <a href="#">Sign Up</a>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</section>
<script src="/assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="/assets/js/core/bootstrap.min.js" type="text/javascript"></script>

<script src="">
    (function($) {
        "use strict";
    })(jQuery);
</script>
<!-- Javascript Requirements -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

{!! JsValidator::formRequest('App\Http\Requests\AdminLoginRequest') !!}
</body>
</html>

