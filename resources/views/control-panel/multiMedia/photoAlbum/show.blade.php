@extends('layouts.control-panel')

@section('content')

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>{{ __('View ').$album->name.__(' Photos') }}</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('photo-album.index') }}">{{ __('All Photo Album') }}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">{{ __('Multi Media') }}</a></li>
        </ol>
    </div>
</div>
{{-- alert componant --}}
<x-alert />
{{-- end alert component --}}

<form method="POST" action="{{ route('photo-album.updatePhotos',$album->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        @foreach($album->photoAlbumImages as $gallery)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <div class="new-arrival-product">
                        <div class="new-arrivals-img-contnent">
                            <img class="img-fluid" src="{{ asset('storage/'.$gallery->image) }}"
                                alt="{{ $album->name }}">
                        </div>
                        <div class="product-content text-center mt-3">
                            <ul class="star-rating">
                                <li>{{ __('Select For Delete') }}<input style="margin-right: 0.6rem;" type="checkbox" name="{{ " check_".$gallery->id }}" class="form-check-input"
                                    value=""></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    {{-- Gallary image --}}
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group fallback w-100">
                            <label for="gallery" class="form-label">{{ __('Add Album Photos') }}</label>
                            <input type="file" multiple id="gallery" name="gallery[]" class="form-control"
                                data-default-file="">
                        </div>
                    </div>
                    {{-- end gallary image --}}

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
