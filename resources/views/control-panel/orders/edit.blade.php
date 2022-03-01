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
            <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">{{ __('Orders') }}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">{{ __('View Order') }}</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-header">

                <h5 class="card-title">{{ __('View Order') }}</h5>

            </div>
            <div class="card-body">
                {{-- alert componant --}}
                <x-alert />
                {{-- end alert component --}}

                {{-- form for update clients --}}
                <form method="POST" action="{{ route('orders.update',$order->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        {{-- client name --}}
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group">
                                <h4> {{ __('Client Name') }}</h4>
                                <label for="name" class="form-label">{{ $order->name }}</label>
                            </div>
                        </div>
                        {{-- end client name --}}

                       {{-- client URL --}}
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group fallback w-100">
                                <h4> {{ __('Client Email') }}</h4>
                                <label for="client_url" class="form-label">{{ $order->email }}</label>
                            </div>
                        </div>
                        {{-- end client URL --}}

                        {{-- client URL --}}
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group fallback w-100">
                                <h4> {{ __('Client Phone') }}</h4>
                                <label for="client_url" class="form-label">{{ $order->phone }}</label>
                            </div>
                        </div>
                        {{-- end client URL --}}

                        {{-- client URL --}}
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-group fallback w-100">
                                <h4> {{ __('Service') }}</h4>
                                <label for="client_url" class="form-label">{{ $order->service->name }}</label>
                            </div>
                        </div>
                        {{-- end client URL --}}

                        {{-- client URL --}}
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group fallback w-100">
                                <h4> {{ __('Client Message') }}</h4>
                                <label for="client_url" class="form-label">{{ $order->description }}</label>
                            </div>
                        </div>
                        {{-- end client URL --}}

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group fallback w-100">
                                <div class="form-group">
                                    <label for="status" class="form-label">{{ __('Select Status') }}</label>

                                    <select name="status" id="status" class="form-control">
                                        <option @if($order->status == 'new') selected @endif value="new">{{ __('New') }}<option>
                                        <option @if($order->status == 'continued') selected @endif value="continued">{{ __('Continued') }}<option>
                                        <option @if($order->status == 'followed') selected @endif value="followed">{{ __('Followed') }}<option>
                                        <option @if($order->status == 'end') selected @endif value="end">{{ __('End') }}<option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group fallback w-100">
                                <label for="note" class="form-label">{{ __('Add Notification') }}</label>
                                <textarea name="note" id="note" class="form-control" rows="4">{{ old('note',$order->note) }}</textarea>
                            </div>
                        </div>

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
