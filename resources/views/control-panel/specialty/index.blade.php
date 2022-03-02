@extends('layouts.control-panel')

@section('content')

<div class="row specialty-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>{{ __('All Specialties') }}</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('specialties.index') }}">{{ __('Specialty') }}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">{{ __('All Specialties') }}</a></li>
        </ol>
    </div>
</div>

<div class="row">

    <div class="col-lg-12">
        <div class="row tab-content">
            <div id="list-view" class="tab-pane fade active show col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('All Specialties') }}  </h4>
                        <a href="{{ route('specialties.create') }}" class="btn btn-primary">{{ __('+ Add new') }}</a>
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
                                        <th>{{ __('Sub Title') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- get projects from database --}}
                                    @foreach ($specialties as $specialty)
                                        <tr >
                                            <td style="text-align: center;"><img class="mt-1" src="{{ asset('storage/'.$specialty->image) }}" width="50" alt="{{ $specialty->title }}"></td>
                                            <td>{{ $specialty->title }}</td>
                                            <td>{{ $specialty->sub_title }}</td>
                                            <td style="padding-top: 10px;">
                                                <form method="post" id="deleteprojectform" action="{{route('specialties.destroy',$specialty->id)}}">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('specialties.edit', $specialty->id) }}" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                    <a href="{{ route('specialties.show', $specialty->id) }}" class="btn btn-sm btn-warning"><i class="la la-pencil"></i></a>
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
