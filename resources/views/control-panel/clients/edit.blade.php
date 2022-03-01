@extends('layouts.control-panel')

@section('content')

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>{{ __('Edit Clients') }}</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">{{ __('Clients') }}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">{{ __('All Clients') }}</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-header">

                <h5 class="card-title">{{ __('Client Update') }}</h5>

            </div>
            <div class="card-body">
                {{-- alert componant --}}
                <x-alert />
                {{-- end alert component --}}

                {{-- form for update clients --}}
                <form method="POST" action="{{ route('clients.update',$client->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        {{-- client name --}}
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="name" class="form-label">{{ __('Client Name') }}</label>
                                <input type="text"  class="form-control" id="name" name="name" value="{{ old('name',$client->name) }}" required autofocus >
                            </div>
                        </div>
                        {{-- end client name --}}

                         {{-- client image --}}
                         <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group fallback w-100">
                                @if($client->image)
                                    <img src="{{ asset('storage/'.$client->image) }}" width="50" alt="{{ $client->name }}">
                                @endif
                                <label for="image" class="form-label">{{ __('Client Image') }}</label>
                                <input type="file" id="image" name="image" class="form-control" data-default-file="" >
                            </div>
                        </div>
                        {{-- end client image --}}

                       {{-- client URL --}}
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group fallback w-100">
                                <label for="client_url" class="form-label">{{ __('Client URL') }}</label>
                                <input type="text" id="client_url" name="client_url" value="{{ old('clientt_url',$client->client_url) }}" class="form-control" data-default-file="" required>
                            </div>
                        </div>
                        {{-- end client URL --}}

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
