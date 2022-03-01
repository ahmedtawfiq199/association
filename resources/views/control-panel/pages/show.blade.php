@extends('layouts.control-panel')

@section('content')

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>{{ __('Page Details') }}</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('pages.index') }}">{{ __('Pages') }}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">{{ __('Page Details') }}</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-3 col-xxl-4 col-lg-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <img class="img-fluid" src="{{ asset('storage/'.$page->main_image) }}" alt="{{ $page->title }}">
                    <div class="card-body">
                        <h4 class="mb-0">{{ $page->title }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">{{ __('Sub Title Page') }}</h2>
                    </div>
                    <div class="card-body pb-0">
                        <p class="mb-5">{{ $page->sub_title }}</p>
                        <ul class="list-group list-group-flush">
                            <li class="d-flex px-0 justify-content-between">
                                <h5>{{ __('Gallery') }}</h5>
                            </li>
                            <li class="list-group-item d-flex px-0 justify-content-between">
                                @foreach ($page->images as $gallery)
                                    <img src="{{ asset('storage/'.$gallery->image) }}" width="50" alt="{{ $page->title }}">
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
                <div class="mb-5">{!! $page->description !!}</div>

                <h4 class="text-primary">{{ __('Page Tags') }}</h4>
                <div class="profile-skills pt-2 border-bottom-1 pb-2">
                    @foreach ($page->tags as $tag)
                        <a href="javascript:void()" class="btn btn-outline-dark btn-rounded px-4 my-3 my-sm-0 mr-3 m-b-10">{{ $tag->name }}</a>
                    @endforeach
                  </div>
                </div>
        </div>
    </div>
</div>

@endsection
