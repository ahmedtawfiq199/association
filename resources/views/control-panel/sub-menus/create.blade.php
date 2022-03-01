@extends('layouts.control-panel')

@section('content')

    <div class="row Menu-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>{{ __('Create Sub-Menus') }}</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('sub-menus.index') }}">{{ __('Sub-Menus') }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">{{ __('All Sub-Menus') }}</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">

                    <h5 class="card-title">{{ __('Create SubMenus') }}</h5>

                </div>
                <div class="card-body">
                    {{-- alert componant --}}
                    <x-alert />
                    {{-- end alert component --}}

                    {{-- form for store clients --}}
                    <form method="POST" action="{{ route('sub-menus.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{-- project title --}}
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="title" class="form-label">{{ __('Sub-Menu name') }}</label>
                                    <input type="text"  class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus >
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group fallback w-100">
                                    <div class="form-group">
                                        <label for="menu_id" class="form-label">{{ __('Menu Name') }}</label>

                                        <select name="menu_id" id="menu_id" class="form-control">
                                            @foreach (App\Models\Menu::all() as $menu)
                                                <option @if($menu->id == old('menu_id')) selected  @endif value="{{ $menu->id }}">{{ $menu->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
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
