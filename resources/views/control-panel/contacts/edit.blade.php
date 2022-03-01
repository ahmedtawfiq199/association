@extends('layouts.control-panel')

@section('content')

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>{{ __('View Order') }}</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('contacts.index') }}">{{ __('Contacts') }}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">{{ __('View Contact') }}</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('View Contact') }}</h5>
            </div>
            <div class="card-body">
                {{-- alert componant --}}
                <x-alert />
                {{-- end alert component --}}

                <div class="row">
                    {{-- client name --}}
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <h4> {{ __('Client Name') }}</h4>
                            <label for="name" class="form-label">{{ $contact->name }}</label>
                        </div>
                    </div>
                    {{-- end client name --}}

                    {{-- client URL --}}
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group fallback w-100">
                            <h4> {{ __('Client Email') }}</h4>
                            <label for="client_url" class="form-label">{{ $contact->email }}</label>
                        </div>
                    </div>
                    {{-- end client URL --}}


                    {{-- client URL --}}
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group fallback w-100">
                            <h4> {{ __('Client Message') }}</h4>
                            <label for="client_url" class="form-label">{{ $contact->message }}</label>
                        </div>
                    </div>
                    {{-- end client URL --}}

            </div>
        </div>
    </div>
</div>

@endsection
