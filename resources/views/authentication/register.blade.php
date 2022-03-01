
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ (App\Models\Websit::latest()->first()->websit_title ?? config('app.name', 'Laravel')) }}</title>
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
                                    <h4 class="text-center mb-4">{{ __('Sign up your account') }}</h4>
                                    <x-alert />
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name" class="form-label">{{ __('Name') }}</label>
                                            <input type="text"  class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus >
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="form-label">{{ __('Email') }}</label>
                                            <input id="email" class="form-control"  type="email" name="email" value="{{ old('email') }}" required >
                                        </div>
                                        <div class="form-group">
                                            <label for="user_name"><strong>{{ __('Username') }}</strong></label>
                                            <input type="text" id="user_name" class="form-control" name="user_name" value="{{ old('user_name') }}" autofocus >
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="form-label">{{ __('Password') }}</label>
                                            <input class="form-control"
                                            type="password"
                                            name="password"
                                            id="password"
                                            required autocomplete="new-password">
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                                            <input type="password" id="password_confirmation" class="form-control"  name="password_confirmation" required >
                                        </div>
                                        <div class="form-group">
                                            <label for="phone" class="form-label">{{ __('Mobile Number') }}</label>
                                            <input type="text" id="phone" name="phone" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="address" class="form-label">{{ __('Address') }}</label>
                                            <input type="text" id="address" name="address" class="form-control">
                                        </div>

                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">{{ __('Sign me up') }}</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>{{ __('Already have an account?') }} <a class="text-primary" href="{{ route('login') }}">{{ __('Sign in') }}</a></p>
                                    </div>
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
    <script src="{{ asset('assets/control-panel/js/dlabnav-init.js') }}"></script>
    <!--endRemoveIf(production)-->
</body>

</html>
