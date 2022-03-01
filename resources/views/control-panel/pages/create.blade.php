@extends('layouts.control-panel')

@section('content')

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>{{ __('Create Pages') }}</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('pages.index') }}">{{ __('Pages') }}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">{{ __('All Pages') }}</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-header">

                <h5 class="card-title">{{ __('Create Page') }}</h5>

            </div>
            <div class="card-body">
                {{-- alert componant --}}
                <x-alert />
                {{-- end alert component --}}

                {{-- form for store clients --}}
                <form method="POST" action="{{ route('pages.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        {{-- project title --}}
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="title" class="form-label">{{ __('Page Title') }}</label>
                                <input type="text"  class="form-control" id="title" name="title" value="{{ old('title') }}" required autofocus >
                            </div>
                        </div>
                        {{-- end project title --}}

                        {{-- project title --}}
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="sub_title" class="form-label">{{ __('Page Sub Title') }}</label>
                                <input type="text"  class="form-control" id="sub_title" name="sub_title" value="{{ old('sub_title') }}" >
                            </div>
                        </div>
                        {{-- end project title --}}

                        {{-- main image --}}
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group fallback w-100">
                                <label for="main_image" class="form-label">{{ __('Page Main Image') }}</label>
                                <input type="file" id="main_image" name="main_image" class="form-control" data-default-file="" >
                            </div>
                        </div>
                        {{-- end main image --}}



                        {{-- project title --}}
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <textarea name="description" id="summernote" cols="30" rows="10">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        {{-- end project title --}}

                        {{-- Gallary image --}}
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group fallback w-100">
                                <label for="gallery" class="form-label">{{ __('Other Gallery Image') }}</label>
                                <input type="file" multiple id="gallery" name="gallery[]" class="form-control" data-default-file="" >
                            </div>
                        </div>
                        {{-- end gallary image --}}

                        {{-- project title --}}
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="tags" class="form-label">{{ __('Page Tags') }}</label>
                                <input type="text" value="{{ old('tags') }}" class="form-control" data-role="tagsinput"  name="tags">
                            </div>
                        </div>
                        {{-- end project title --}}


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
