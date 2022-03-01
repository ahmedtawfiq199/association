@extends('layouts.control-panel')

@section('content')

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>{{ __('All Projects') }}</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">{{ __('Projects') }}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">{{ __('All Projects') }}</a></li>
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
                        <h4 class="card-title">{{ __('All Projects') }}  </h4>
                        <a href="{{ route('projects.create') }}" class="btn btn-primary">{{ __('+ Add new') }}</a>
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
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Client Name') }}</th>
                                        <th>{{ __('Service Name') }}</th>
                                        <th>{{ __('During Date') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- get projects from database --}}
                                    @foreach ($projects as $project)
                                        <tr >
                                            <td style="text-align: center;"><img class="mt-1" src="{{ asset('storage/'.$project->main_image) }}" width="50" alt="{{ $project->title }}"></td>
                                            <td>{{ $project->title }}</td>
                                            <td>{{ $project->client->name ?? 'no client'}}</td>
                                            <td>{{ $project->service->name }}</td>
                                            <td>{{ $project->during_date }}</td>
                                            <td style="padding-top: 10px;">
                                                <form method="post" id="deleteprojectform" action="{{route('projects.destroy',$project->id)}}">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
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
                    @foreach ($projects as $project)
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
                                            <img src="{{ asset('storage/'.$project->main_image) }}" width="100" class="img-fluid rounded-circle" alt="">
                                        </div>
                                        <h3 class="mt-4 mb-1">{{ $project->title }}</h3>

                                        <ul class="list-group mb-3 list-group-flush">
                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                <span class="mb-0">{{ __('Client Name :') }}</span><strong>{{ $project->client->name ?? 'No Client' }}</strong></li>
                                            <li class="list-group-item px-0 d-flex justify-content-between">
                                                <span class="mb-0">{{ __('Service Name :') }}</span><strong>{{ $project->service->name }}</strong></li>
                                        </ul>


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
