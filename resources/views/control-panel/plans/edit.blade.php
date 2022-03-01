
@extends('layouts.control-panel')

@section('content')

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>{{ __('Create Plan') }}</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('plans.show',$plan->subService->id) }}">{{ $plan->subService->name." ". __('Plans') }}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0);">{{ __('All Plan') }}</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-sm-12">
        <div class="card">
            <div class="card-header">

                <h5 class="card-title">{{ __('Create Plan') }}</h5>

            </div>
            <div class="card-body">
                {{-- alert componant --}}
                <x-alert />
                {{-- end alert component --}}

                {{-- form for store services --}}
                <form method="POST" action="{{ route('plans.update',$plan->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="sub_service_id" value="{{ $plan->subService->id }}">
                    <div class="row">
                        {{-- service name --}}
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="name" class="form-label">{{ __('Plan Name') }}</label>
                                <input type="text"  class="form-control" id="name" name="name" value="{{ old('name',$plan->name) }}" required autofocus >
                            </div>
                        </div>
                        {{-- end service name --}}

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="price" class="form-label">{{ __('Plan Price') }}</label>
                                <input type="text"  class="form-control" id="price" name="price" value="{{ old('price',$plan->price) }}" required autofocus >
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group fallback w-100">
                                <div class="form-group">
                                    <label for="type" class="form-label">{{ __('Plan Type') }}</label>
                                    <select name="type" id="type" class="form-control">
                                        <option @if($plan->type == 'windows') selected @endif value="windows">{{ __('Windows') }}</option>
                                        <option @if($plan->type == 'linux') selected @endif value="linux">{{ __('Linux') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group fallback w-100">
                                <div class="form-group">
                                    <label for="during" class="form-label">{{ __('Plan During') }}</label>
                                    <select name="during" id="during" class="form-control">
                                        <option @if($plan->during == '6 month') selected @endif value="6 month">{{ __('6 month') }}</option>
                                        <option @if($plan->during == '1 year') selected @endif value="1 year">{{ __('1 year') }}</option>
                                        <option @if($plan->during == '2 year') selected @endif value="2 year">{{ __('2 year') }}</option>
                                        <option @if($plan->during == '3 year') selected @endif value="3 year">{{ __('3 year') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group fallback w-100">
                                <div class="form-group">
                                    <label for="during" class="form-label">{{ __('Plan Feature') }}</label>
                                </div>
                            </div>
                        </div>

                        @if(($x = count($plan->features)) != 0)
                            <div id="education_fields" class="col-md-12 col-lg-12 col-sm-12" style="width: 100%;">

                            </div>
                            @php
                                $y = count($plan->features);
                            @endphp
                            @foreach ($plan->features as $key => $feature)
                                <div class="col-md-12 col-lg-12 col-sm-12"style="width: 100%;">
                                    <div class="row removeclass{{ $x-- }}">
                                        <div class="col-md-4 col-sm-12 col-lg-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="Degree" name="featureName[]" value="{{ $feature->name }}" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-lg-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="Degree" name="featureValue[]" value="{{ $feature->value }}" placeholder="Value">
                                            </div>
                                        </div>

                                        @if($key == (count($plan->features)-1))
                                        <div class="col-md-4 col-sm-12 col-lg-4">
                                            <div class="form-group">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="fa fa-plus" aria-hidden="true"></span> </button>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="col-md-4 col-sm-12 col-lg-4">
                                            <div class="form-group">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-danger" type="button" onclick="remove_education_fields({{ $y-- }});">
                                                        <span class="fa fa-minus" aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach


                        @else
                            <div id="education_fields" class="col-md-12 col-lg-12 col-sm-12" style="width: 100%;">

                            </div>
                            <div class="col-md-4 col-sm-12 col-lg-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="Degree" name="featureName[]" value="" placeholder="Name">
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12 col-lg-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="Degree" name="featureValue[]" value="" placeholder="Value">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-lg-4">
                                <div class="form-group">
                                    <div class="input-group-btn">
                                        <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="fa fa-plus" aria-hidden="true"></span> </button>
                                    </div>
                                </div>
                            </div>

                        @endif



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
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script>
        var room = {{ count($plan->features) }};
        function education_fields() {

            room++;
            var objTo = document.getElementById('education_fields')
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "row removeclass"+room);
            var rdiv = 'removeclass'+room;
            divtest.innerHTML = '<div class="col-md-4 col-sm-12 col-lg-4"><div class="form-group"><input type="text" class="form-control" id="Degree" name="featureName[]" value="" placeholder="Name"></div></div><div class="col-md-4 col-sm-12 col-lg-4"><div class="form-group"><input type="text" class="form-control" id="Degree" name="featureValue[]" value="" placeholder="Value"></div></div><div class="col-md-4 col-sm-12 col-lg-4"><div class="form-group"><div class="input-group-btn"><button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="fa fa-minus" aria-hidden="true"></span> </button></div></div></div>';

            objTo.appendChild(divtest)
        }
        function remove_education_fields(rid) {
            $('.removeclass'+rid).remove();
        }
    </script>
@endsection
