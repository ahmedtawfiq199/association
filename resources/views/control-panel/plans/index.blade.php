@extends('layouts.control-panel')

@section('content')

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>{{ $sub_service->name." ".__('Plans') }}</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('plans.show',$sub_service->id) }}">{{ __('Plans') }}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">{{ $sub_service->name." ".__('Plans') }}</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="row tab-content">
            <div id="list-view" class="tab-pane fade active show col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $sub_service->name." ".__('Plans') }}  </h4>
                        <a href="{{ route('plans.create',$sub_service->id) }}" class="btn btn-primary">{{ __('+ Add new') }}</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {{-- alert componant --}}
                            <x-alert />
                            {{-- end alert componant --}}

                            {{-- table for display users --}}
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Price') }}</th>
                                        <th>{{ __('Type') }}</th>
                                        <th>{{ __('During') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- get services from database --}}
                                    @foreach ($sub_service->plans as $plan)
                                        <tr>
                                            <td>{{ $plan->name }}</td>
                                            <td>{{ $plan->price }}</td>
                                            <td>{{ $plan->type }}</td>
                                            <td>{{ $plan->during }}</td>
                                            <td style="padding-top: 10px;">
                                                <form method="post" id="deleteserviceform" action="{{ route('plans.destroy',$plan->id) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('plans.edit',$plan->id) }}" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
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
