@extends('layouts.control-panel')

@section('content')

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>{{ __('All Orders') }}</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">{{ __('Orders') }}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">{{ __('All Orders') }}</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <ul class="nav nav-pills mb-3">
            <li class="nav-item"><a href="#list-view" data-toggle="tab" class="nav-link btn-primary mr-1 show active">{{ __('List View') }}</a></li>
        </ul>
    </div>
    <div class="col-lg-12">
        <div class="row tab-content">
            <div id="list-view" class="tab-pane fade active show col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('All Orders') }}  </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {{-- alert componant --}}
                            <x-alert />
                            {{-- end alert componant --}}

                            {{-- table for display clients --}}
                            <table id="ordersTable" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>{{ __('Client Name') }}</th>
                                        <th>{{ __('Service') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Date') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- get clients from database --}}
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->name }}</td>
                                            <td>{{ $order->service->name }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>{{ Carbon\Carbon::parse($order->created_at)->format('y-m-d') }}</td>
                                            <td style="padding-top: 10px;">
                                                <form method="post" id="deleteclientform" action="{{route('orders.destroy',$order->id)}}">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
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
