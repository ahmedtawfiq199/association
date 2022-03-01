@extends('layouts.control-panel')

@section('content')

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>{{ __('All Vedio Albums') }}</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">{{ __('All Vedio Albums') }}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">{{ __('Multi Media') }}</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="row tab-content">
            <div id="list-view" class="tab-pane fade active show col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('All Vedio Albums') }}  </h4>
                        <a href="{{ route('vedio-album.create') }}" class="btn btn-primary">{{ __('+ Add new') }}</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {{-- alert componant --}}
                            <x-alert />
                            {{-- end alert componant --}}

                            {{-- table for display clients --}}
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>{{ __('Album Name') }}</th>
                                        <th>{{ __('Link') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- get clients from database --}}
                                    @foreach ($albums as $album)
                                        <tr>
                                            <td>{{ $album->name }}</td>
                                            <td><a href="{{ $album->link }}" target="_blank">{{ $album->link }}</a></td>
                                            <td style="padding-top: 10px;">
                                                <form method="post" id="deleteclientform" action="{{route('vedio-album.destroy',$album->id)}}">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('vedio-album.edit', $album->id) }}" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
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
