@extends('layouts.control-panel')

@section('content')

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>{{ __('Add User') }}</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('all-users') }}">{{ __('Users') }}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">{{ __('Add User') }}</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-header">

                <h5 class="card-title">{{ __('Basic Info') }}</h5>

            </div>
            <div class="card-body">
                {{-- alert componant --}}
                <x-alert />
                {{-- end alert component --}}

                {{-- form for store users --}}
                <form method="POST" action="{{ route('store-users') }}">
                    @csrf
                    <div class="row">
                        {{-- user name --}}
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input type="text"  class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus >
                            </div>
                        </div>
                        {{-- end user name --}}

                        {{-- user email --}}
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input id="email" class="form-control"  type="email" name="email" value="{{ old('email') }}" required >
                            </div>
                        </div>
                        {{-- end user email --}}

                        {{-- username for user --}}
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="user_name" class="form-label">{{ __('Username') }}</label>
                                <input id="user_name" class="form-control"  type="text" name="user_name" value="{{ old('user_name') }}" required >
                            </div>
                        </div>
                        {{-- end username --}}

                        {{-- user password --}}
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input class="form-control"
                                type="password"
                                name="password"
                                id="password"
                                required autocomplete="new-password">
                            </div>
                        </div>
                        {{-- end user password --}}

                        {{-- password confirm --}}
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                                <input type="password" id="password_confirmation" class="form-control"  name="password_confirmation" required >
                            </div>
                        </div>
                        {{-- end password confirm --}}

                        {{-- user phone number --}}
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="phone" class="form-label">{{ __('Mobile Number') }}</label>
                                <input type="text" id="phone" name="phone" class="form-control">
                            </div>
                        </div>
                        {{-- end phone number --}}

                        {{-- user address --}}
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="address" class="form-label">{{ __('Address') }}</label>
                                <input type="text" id="address" name="address" class="form-control">
                            </div>
                        </div>
                        {{-- end user address --}}

                        {{-- user role --}}
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="role" class="form-label">{{ __('Role') }}</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="Administrator">{{ __('Administrator') }}</option>
                                    <option value="Author">{{ __('Author') }}</option>
                                </select>
                            </div>
                        </div>
                        {{-- end user role --}}

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            <button type="reset" class="btn btn-light">{{ __('Cencel') }}</button>
                        </div>
                    </div>
                </form>
                {{-- end form --}}
            </div>
        </div>
    </div>
</div>

@endsection
