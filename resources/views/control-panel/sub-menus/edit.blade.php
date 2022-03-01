@extends('layouts.control-panel')

@section('content')

    <div class="row Menu-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>{{ __('Create Menus') }}</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('menus.index') }}">{{ __('Menus') }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">{{ __('All Menus') }}</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">

                    <h5 class="card-title">{{ __('Update Menus') }}</h5>

                </div>
                <div class="card-body">
                    {{-- alert componant --}}
                    <x-alert />
                    {{-- end alert component --}}

                    {{-- form for store clients --}}
                    <form method="POST" action="{{ route('menus.update',$menu->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            {{-- project title --}}
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="title" class="form-label">{{ __('Menu name') }}</label>
                                    <input type="text"  class="form-control" id="name" name="name" value="{{ old('name',$menu->name)  }}" required autofocus >
                                </div>
                            </div>
                            {{-- end project title --}}
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="title" class="form-label">{{ __('Menu Link') }}</label>
                                   <div class="d-block">
                                       <input type="text" style="display: inline-block; width: auto;" class="form-control"  value="{{old('link',$menu->link)}}" id="link" name="link"  required autofocus >
                                       <label for="title" class="form-label">{{\App\Models\Websit::first()->url}}/</label>
                                   </div>
                                </div>
                                <h6 class="alert alert-primary">Note : add direct link in the page here </h6>

                            </div>


                            {{-- project title --}}


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
