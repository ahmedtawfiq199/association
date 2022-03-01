@extends('layouts.control-panel')

@section('content')

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>{{ __('Add Users') }}</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('all-users') }}">{{ __('Users') }}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">{{ __('Edit User') }}</a></li>
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
                <form method="POST" action="{{ route('update-users', ['user'=>$user->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        {{-- user name --}}
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input type="text"  class="form-control" id="name" name="name" value="{{ old('name',$user->name) }}" required autofocus >
                            </div>
                        </div>
                        {{-- end user name --}}

                        {{-- user email --}}
                        <div class="col-lg-6 col-md-6 col-sm-12" >
                            <div class="form-group">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input id="email" class="form-control"  type="email" name="email" value="{{ old('email',$user->email) }}" disabled >
                            </div>
                        </div>
                        {{-- end user email --}}

                        {{-- username for user --}}
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="user_name" class="form-label">{{ __('Username') }}</label>
                                <input id="user_name" class="form-control"  type="text" name="user_name" value="{{ old('user_name',$user->user_name) }}" disabled >
                            </div>
                        </div>
                        {{-- end username --}}

                        {{-- user change password --}}
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="password" class="form-label">{{ __('Change Password') }}</label>
                                <input class="form-control"
                                type="password"
                                name="password"
                                id="password"
                                autocomplete="new-password">
                            </div>
                        </div>
                        {{-- end change password --}}

                        {{-- user phone --}}
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="phone" class="form-label">{{ __('Mobile Number') }}</label>
                                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone',$user->phone) }}">
                            </div>
                        </div>
                        {{-- end user phone --}}

                        {{-- user address --}}
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="address" class="form-label">{{ __('Address') }}</label>
                                <input type="text" id="address" name="address" class="form-control" value="{{ old('address',$user->address) }}">
                            </div>
                        </div>
                        {{-- end user address --}}

                        {{-- Auth user can't edit his role --}}
                        @if(! ($user->id == Auth::user()->id))
                        {{-- user role --}}
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="role" class="form-label">{{ __('Role') }}</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="Administrator"
                                    @if($user->role == 'Administrator')
                                        selected
                                    @endif
                                    >{{ __('Administrator') }}</option>
                                    <option value="Author"
                                    @if($user->role == 'Author')
                                        selected
                                    @endif
                                    >{{ __('Author') }}</option>
                                </select>
                            </div>
                        </div>
                        {{-- end user role --}}
                        @endif

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            <button type="reset" class="btn btn-light">{{ __('Reset') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
