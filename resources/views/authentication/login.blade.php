<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ (App\Models\Websit::latest()->first()->websit_title ?? config('app.name', 'Laravel')) }} </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('storage/'. (App\Models\Websit::latest()->first()->favicon_image ?? 'assets/favicon.png'))}}">
    <link href="{{ asset('assets/control-panel/css/style.css') }}" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">{{ __('Sign in your account') }}</h4>
                                    <x-alert />
                                    <form {{ route('login') }} method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email"><strong>{{ __('Email Or Username') }}</strong></label>
                                            <input type="text" id="email" class="form-control" name="email" value="{{ old('email') }}" autofocus >
                                        </div>

                                        <div class="form-group">
                                            <label for="password"><strong>{{ __('Password') }}</strong></label>
                                            <input type="password" name="password" class="form-control" id="password" required autocomplete="current-password">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                               <div class="custom-control custom-checkbox ml-1">
													<input type="checkbox" id="remember_me" class="custom-control-input" id="basic_checkbox_1" name="remember">
													<label class="custom-control-label" for="basic_checkbox_1" for="remember_me">{{ __('Remember me') }}</label>
												</div>
                                            </div>
                                            <div class="form-group">
                                                @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">{{ __('Sign me in') }}</button>
                                        </div>
                                    </form>
                                    {{-- <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="{{ route('register') }}">{{ __('Sign up') }}</a></p>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('assets/control-panel/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('assets/control-panel/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/control-panel/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/control-panel/js/dlabnav-init.js') }}"></script>

</body>

</html>
