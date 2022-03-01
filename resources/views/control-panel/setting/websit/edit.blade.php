@extends('layouts.control-panel')

@section('content')


				<div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>{{ __('Website Setting') }}</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">

                            <li class="breadcrumb-item active"><a href="javascript:void(0);">{{ __('Setting') }}</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">{{ __('Website Setting') }}</a></li>
                        </ol>
                    </div>
                </div>

				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
								<h5 class="card-title">{{ __('Website Info') }}</h5>
							</div>
							<div class="card-body">
                                {{-- alert tag --}}
                                <x-alert />
                                {{-- end alert --}}

                                {{-- edit website form --}}
                                <form action="{{ route('setting-website-update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
									<div class="row">

                                        {{-- website title --}}
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label for="websit_title" class="form-label">{{ __('Website Title') }}</label>
												<input type="text" id="websit_title" name="websit_title" value="{{ old('websit_title',($website->websit_title ?? config('app.name', 'Laravel'))) }}" class="form-control" required>
											</div>
										</div>
                                        {{-- end website title --}}

                                        {{-- website email --}}
                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label for="email" class="form-label">{{ __('Website Email') }}</label>
												<input type="email" id="email" name="email" value="{{ old('email',($website->email ?? config('appInformation.email'))) }}" class="form-control" required>
											</div>
										</div>
                                        {{-- end website email --}}

                                        {{-- website telephone --}}
                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label for="telephone_number" class="form-label">{{ __('Website Telephone') }}</label>
												<input type="text" id="telephone_number" name="telephone_number" value="{{ old('telephone_number',($website->telephone_number ?? config('appInformation.telephone'))) }}" class="form-control" required>
											</div>
										</div>
                                        {{-- end website telephone --}}

                                        {{-- website phone --}}
                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label for="phone" class="form-label">{{ __('Website Phone') }}</label>
												<input type="text" id="phone" name="phone" value="{{ old('phone',($website->phone ?? config('appInformation.phone'))) }}" class="form-control" required>
											</div>
										</div>
                                        {{-- end website phone --}}

                                        {{-- website logo --}}
                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group fallback w-100">
                                                @if($website)<img src="{{ asset('storage/'.$website->logo) }}" width="50" alt="logo">@endif
                                                <label for="logo" class="form-label">{{ __('Logo') }}</label>
												<input type="file" id="logo" name="logo" class="form-control" value="{{ old('Logo',($website->Logo ?? ' ')) }}" data-default-file="" >
											</div>
										</div>
                                        {{-- end website logo --}}

                                        {{-- website favicon --}}
                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group fallback w-100">
                                                @if($website)<img src="{{ asset('storage/'.$website->favicon_image) }}" width="30" alt="favicon">@else <img src="{{ asset('storage/assets/favicon.png') }}" width="30" alt=""> @endif
                                                <label for="favicon_image" class="form-label">{{ __('Favicon Image') }}</label>
												<input type="file" id="favicon_image" name="favicon_image" class="form-control" value="{{ old('favicon_image',($website->favicon_image ?? ' ')) }}" data-default-file="" >
											</div>
										</div>
                                        {{-- end website favicon --}}

                                        {{-- website seo keyword --}}
                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label for="seo_keyword" class="form-label">{{ __('SEO Keywords') }}</label>
												<input type="text" id="seo_keyword" name="seo_keyword" value="{{ old('seo_keyword',($website->seo_keyword ?? ' ')) }}" class="form-control">
											</div>
										</div>
                                        {{-- end website seo keyword --}}

                                        {{-- website facebook --}}
                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label for="facebook" class="form-label">{{ __('Facebook') }}</label>
												<input type="text" id="facebook" name="facebook" value="{{ old('facebook',($website->facebook ?? ' ')) }}" class="form-control">
											</div>
										</div>
                                        {{-- end website facebook --}}

                                        {{-- website instagram --}}
                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label for="instagram" class="form-label">{{ __('Instagram') }}</label>
												<input type="text" id="instagram" name="instagram" value="{{ old('instagram',($website->instagram ?? ' ')) }}" class="form-control">
											</div>
										</div>
                                        {{-- end website instagram --}}

                                        {{-- website whatsapp --}}
                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label for="whatsapp" class="form-label">{{ __('Whatsapp') }}</label>
												<input type="text" id="whatsapp" name="whatsapp" value="{{ old('whatsapp',($website->whatsapp ?? ' ')) }}" class="form-control">
											</div>
										</div>
                                        {{-- end website whatsapp --}}

                                        {{-- website youtube --}}
                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label for="youtube" class="form-label">{{ __('Youtube') }}</label>
												<input type="text" id="youtube" name="youtube" value="{{ old('youtube',($website->youtube ?? ' ')) }}" class="form-control">
											</div>
										</div>
                                        {{-- end website youtube --}}

                                        {{-- website twitter --}}
                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label for="twitter" class="form-label">{{ __('Twitter') }}</label>
												<input type="text" id="twitter" name="twitter" value="{{ old('twitter',($website->twitter ?? ' ')) }}" class="form-control">
											</div>
										</div>
                                        {{-- end website twitter --}}

                                        {{-- website linkedin --}}
                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label for="linkedin" class="form-label">{{ __('Linkedin') }}</label>
												<input type="text" id="linkedin" name="linkedin" value="{{ old('linkedin',($website->linkedin ?? ' ')) }}" class="form-control">
											</div>
										</div>
                                        {{-- end website linkedin --}}

                                        {{-- website behance --}}
                                        <div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label for="behance" class="form-label">{{ __('Behance') }}</label>
												<input type="text" id="behance" name="behance" value="{{ old('behance',($website->behance ?? ' ')) }}" class="form-control">
											</div>
										</div>
                                        {{-- end website behance --}}

										<div class="col-lg-12 col-md-12 col-sm-12">
											<button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
											<button type="submit" class="btn btn-light">{{ __('Cencel') }}</button>
										</div>
									</div>
								</form>
                                {{-- end edit website form --}}
                            </div>
                        </div>
                    </div>
				</div>




@endsection
