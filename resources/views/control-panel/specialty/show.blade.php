@extends('layouts.control-panel')

@section('content')

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>{{ __('Specialty Details') }}</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('specialties.index') }}">{{ __('Specialties') }}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">{{ __('Specialty Details') }}</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-3 col-xxl-4 col-lg-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <img class="img-fluid" src="{{ asset('storage/'.$specialty->image) }}" alt="{{ $specialty->title }}">
                    <div class="card-body">
                        <h4 class="mb-0">{{ $specialty->title }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">{{ __('Sub Title Specialty') }}</h2>
                    </div>
                    <div class="card-body pb-0">
                        <p class="mb-5">{{ $specialty->sub_title }}</p>
                        <ul class="list-group list-group-flush">
                            <li class="d-flex px-0 justify-content-between">
                                <h5>{{ __('Gallery') }}</h5>
                            </li>
                            <li class="list-group-item d-flex px-0 justify-content-between">
                                @foreach ($specialty->images as $gallery)
                                    <img src="{{ asset('storage/'.$gallery->image) }}" width="50" alt="{{ $specialty->title }}">
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-9 col-xxl-8 col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="mb-5">{!! $specialty->description !!}</div>
        </div>
    </div>
</div>

@endsection
