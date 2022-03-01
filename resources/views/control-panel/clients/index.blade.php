@extends('layouts.control-panel')

@section('content')

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>{{ __('All Clients') }}</h4>
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
    <div class="col-lg-12">
        <ul class="nav nav-pills mb-3">
            <li class="nav-item"><a href="#list-view" data-toggle="tab" class="nav-link btn-primary mr-1 show active">{{ __('List View') }}</a></li>
            <li class="nav-item"><a href="#grid-view" data-toggle="tab" class="nav-link btn-primary">{{ __('Grid View') }}</a></li>
        </ul>
    </div>
    <div class="col-lg-12">
        <div class="row tab-content">
            <div id="list-view" class="tab-pane fade active show col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('All Clients') }}  </h4>
                        <a href="{{ route('clients.create') }}" class="btn btn-primary">{{ __('+ Add new') }}</a>
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
                                        <th style="text-align: center;">{{ __('Image') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Client URL') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- get clients from database --}}
                                    @foreach ($clients as $client)
                                        <tr>
                                            <td style="text-align: center;"><img src="{{ asset('storage/'.$client->image) }}" width="50" alt="{{ $client->name }}"></td>
                                            <td>{{ $client->name }}</td>
                                            <td><a href="{{ $client->client_url }}" target="_blank">{{ $client->client_url }}</a></td>
                                            <td style="padding-top: 10px;">
                                                <form method="post" id="deleteclientform" action="{{route('clients.destroy',$client->id)}}">
                                                    @method('delete')
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $client->id }}">
                                                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
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
            <div id="grid-view" class="tab-pane fade col-lg-12">
                <div class="row">
                    @foreach ($clients as $client)
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="card card-profile">
                                <div class="card-header justify-content-end pb-0">
                                    <div class="dropdown">
                                        <button class="btn btn-link" type="button" data-toggle="dropdown">
                                            <span class="dropdown-dots fs--1"></span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right border py-0">
                                            <div class="py-2">
                                                <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-2">
                                    <div class="text-center">
                                        <div class="profile-photo">
                                            <img src="{{ asset('storage/'.$client->image) }}" width="100" class="img-fluid rounded-circle" alt="">
                                        </div>
                                        <h3 class="mt-4 mb-1">{{ $client->name }}</h3>
                                        <p class="text-muted"><a href="{{ $client->client_url }}" target="_blank">{{ $client->client_url }}</a></p>

                                        <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="professor-profile.html">{{ __('Read More') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
