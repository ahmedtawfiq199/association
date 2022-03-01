@extends('layouts.control-panel')

@section('content')

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>{{ __('All Photo Album') }}</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('Multi Media') }}</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('photo-album.index') }}">{{ __('All Photo Album') }}</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="row tab-content">
            <div id="list-view" class="tab-pane fade active show col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('All Photo Album') }}  </h4>
                        <a href="{{ route('photo-album.create') }}" class="btn btn-primary">{{ __('+ Add new') }}</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {{-- alert componant --}}
                            <x-alert />
                            {{-- end alert componant --}}

                            {{-- table for display projects --}}
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">{{ __('Main Image') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Image Number') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- get projects from database --}}
                                    @foreach ($albums as $album)
                                        <tr >
                                            <td style="text-align: center;"><img class="mt-1" src="{{ asset('storage/'.$album->image) }}" width="50" alt="{{ $album->name }}"></td>
                                            <td>{{ $album->name }}</td>
                                            <td>{{ $album->photoAlbumImages->count() }}</td>
                                            <td style="padding-top: 10px;">
                                                <form method="post" id="deleteprojectform" action="{{route('photo-album.destroy',$album->id)}}">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('photo-album.edit', $album->id) }}" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                    <a href="{{ route('photo-album.show', $album->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-plus"></i></a>
                                                   <button onclick="if (confirm('Want to delete?')) { return true; }else{ return false; }" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- end table --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
