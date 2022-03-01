<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> {{ App\Models\Websit::latest()->first()->websit_title ?? config('app.name', 'Laravel') }} </title>
    <!-- Favicon icon -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('storage/' . (App\Models\Websit::latest()->first()->favicon_image ?? 'assets/favicon.png')) }}">
    <link rel="stylesheet" href="{{ asset('assets/control-panel/vendor/jqvmap/css/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/control-panel/vendor/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/control-panel/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/control-panel/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/control-panel/css/skin-2.css') }}">

    {{-- bootstrap cdn --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('assets/tagsinput/bootstrap-tagsinput.css') }}">
    {{-- Summer Note --}}

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>


</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="images/logo-white.png" alt="">
                <img class="logo-compact" src="images/logo-text-white.png" alt="">
                <img class="brand-title" src="images/logo-text-white.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span
                        class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <a href="#"><i class="mdi mdi-magnify"></i></a>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="{{ __('Search') }}"
                                            aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown">
                                <a class="nav-link bell ai-icon" href="#" role="button" data-toggle="dropdown">
                                    <i class="fa fa-language"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="">
                                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            <li style="padding: 0.25rem 1.5rem;">
                                                <a rel="alternate" hreflang="{{ $localeCode }}"
                                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                    {{ $properties['native'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link bell ai-icon" href="#" role="button" data-toggle="dropdown">
                                    <i class="fa fa-user"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            this.closest('form').submit();" class="dropdown-item ai-icon">
                                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" width="18"
                                                height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-log-out">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                <line x1="21" y1="12" x2="9" y2="12"></line>
                                            </svg>
                                            <span class="ml-2">{{ __('Logout') }} </span>
                                        </a>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">{{ __('Main Menu') }}</li>

                    {{-- this element to view dashboard page --}}
                    <li><a class="ai-icon" href="{{ route('dashboard') }}" aria-expanded="false">
                            <i class="la la-home"></i>
                            <span class="nav-text">{{ __('Dashboard') }}</span>
                        </a>
                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-users"></i>
                            <span class="nav-text">{{ __('Users') }}</span>
                        </a>
                        <ul aria-expanded="false">
                            {{-- this element to view all user page --}}
                            <li><a href="{{ route('all-users') }}">{{ __('All Users') }}</a></li>

                            {{-- this element to view create user page --}}
                            <li><a href="{{ route('create-users') }}">{{ __('Create Users') }}</a></li>

                        </ul>
                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">{{ __('Clients') }}</span>
                        </a>
                        <ul aria-expanded="false">
                            {{-- this element to view all clients page --}}
                            <li><a href="{{ route('clients.index') }}">{{ __('All Clients') }}</a></li>

                            {{-- this element to view create clients page --}}
                            <li><a href="{{ route('clients.create') }}">{{ __('Create Clients') }}</a></li>

                        </ul>
                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-building"></i>
                            <span class="nav-text">{{ __('Services') }}</span>
                        </a>
                        <ul aria-expanded="false">
                            {{-- this element to view all services page --}}
                            <li><a href="{{ route('services.index') }}">{{ __('All Services') }}</a></li>

                            {{-- this element to view all services page --}}
                            <li><a href="{{ route('subservices.index') }}">{{ __('All Sub Services') }}</a></li>

                            {{-- this element to view create services page --}}
                            <li><a href="{{ route('services.create') }}">{{ __('Create Services') }}</a></li>

                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-calendar"></i>
                            <span class="nav-text">{{ __('Menus') }}</span>
                        </a>
                        <ul aria-expanded="false">
                            {{-- this element to view website setting page --}}
                            <li><a href="{{ route('menus.index') }}">{{ __('Website Menus') }}</a></li>
                            <li><a href="{{ route('sub-menus.index') }}">{{ __('Sub-Menus') }}</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-building"></i>
                            <span class="nav-text">{{ __('Multi Media') }}</span>
                        </a>
                        <ul aria-expanded="false">
                            {{-- this element to view all services page --}}
                            <li><a href="{{ route('photo-album.index') }}">{{ __('Photo Album') }}</a></li>

                            {{-- this element to view all services page --}}
                            <li><a href="{{ route('vedio-album.index') }}">{{ __('Vedio Album') }}</a></li>

                        </ul>
                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-calendar"></i>
                            <span class="nav-text">{{ __('Projects') }}</span>
                        </a>
                        <ul aria-expanded="false">
                            {{-- this element to view all services page --}}
                            <li><a href="{{ route('projects.index') }}">{{ __('All Projects') }}</a></li>

                            {{-- this element to view create services page --}}
                            <li><a href="{{ route('projects.create') }}">{{ __('Create Project') }}</a></li>

                        </ul>
                    </li>

                    @if ($hosting = App\Models\Service::where('name', 'LIKE', 'Hosting')->first())
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="la la-calendar"></i>
                                <span class="nav-text">{{ __('Hosting') }}</span>
                            </a>
                            <ul aria-expanded="false">
                                @foreach ($hosting->subServices as $sub_host)
                                    {{-- this element to view all services page --}}
                                    <li><a
                                            href="{{ route('plans.show', $sub_host->id) }}">{{ $sub_host->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-pagelines"></i>
                            <span class="nav-text">{{ __('Pages') }}</span>
                        </a>
                        <ul aria-expanded="false">
                            {{-- this element to view all services page --}}
                            <li><a href="{{ route('pages.index') }}">{{ __('All Pages') }}</a></li>

                            {{-- this element to view create services page --}}
                            <li><a href="{{ route('pages.create') }}">{{ __('Create Page') }}</a></li>

                        </ul>
                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-calendar"></i>
                            <span class="nav-text">{{ __('Blogs') }}</span>
                        </a>
                        <ul aria-expanded="false">
                            {{-- this element to view all services page --}}
                            <li><a href="{{ route('blogs.index') }}">{{ __('All Blogs') }}</a></li>

                            {{-- this element to view create services page --}}
                            <li><a href="{{ route('blogs.create') }}">{{ __('Create Blogs') }}</a></li>

                        </ul>
                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-steam-square"></i>
                            <span class="nav-text">{{ __('Team') }}</span>
                        </a>
                        <ul aria-expanded="false">
                            {{-- this element to view all services page --}}
                            <li><a href="{{ route('teams.index') }}">{{ __('All Team Members') }}</a></li>

                            {{-- this element to view create services page --}}
                            <li><a href="{{ route('teams.create') }}">{{ __('Create Team Member') }}</a></li>

                        </ul>
                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-sliders"></i>
                            <span class="nav-text">{{ __('Slider') }}</span>
                        </a>
                        <ul aria-expanded="false">
                            {{-- this element to view all services page --}}
                            <li><a href="{{ route('sliders.index') }}">{{ __('All Sliders') }}</a></li>

                            {{-- this element to view create services page --}}
                            <li><a href="{{ route('sliders.create') }}">{{ __('Create Slider') }}</a></li>

                        </ul>
                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-reorder"></i>
                            <span class="nav-text">{{ __('Orders') }}</span>
                        </a>
                        <ul aria-expanded="false">
                            {{-- this element to view all services page --}}
                            <li><a href="{{ route('orders.index') }}">{{ __('All Orders') }}</a></li>
                        </ul>
                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-phone"></i>
                            <span class="nav-text">{{ __('Contacts') }}</span>
                        </a>
                        <ul aria-expanded="false">
                            {{-- this element to view all services page --}}
                            <li><a href="{{ route('contacts.index') }}">{{ __('All Contacts') }}</a></li>
                        </ul>
                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-cog"></i>
                            <span class="nav-text">{{ __('Setting') }}</span>
                        </a>
                        <ul aria-expanded="false">
                            {{-- this element to view website setting page --}}
                            <li><a href="{{ route('setting-website-edit') }}">{{ __('Website Setting') }}</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p class="doro-lead">&copy; {{ __('2021 Divvat. All rights reserved') }}</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->

    <script>
        $('#summernote').summernote({
            placeholder: 'Description ...',
            tabsize: 1,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>

    {{-- <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('23ae1db6fc0690bc6180', {
        cluster: 'ap2'
    });

    var channel = pusher.subscribe('private-App.Models.User.'{{ Auth::id() }});
    channel.bind('Illuminate\Notifications\Events\BroadcastNotificationCreated', function(data) {
        alert(JSON.stringify(data.title));
    });
    </script> --}}

    <!-- Required vendors -->
    <script src="{{ asset('assets/control-panel/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets/control-panel/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/control-panel/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/control-panel/js/dlabnav-init.js') }}"></script>

    <!-- Chart ChartJS plugin files -->
    <script src="{{ asset('assets/control-panel/vendor/chart.js/Chart.bundle.min.js') }}"></script>

    <!-- Chart piety plugin files -->
    <script src="{{ asset('assets/control-panel/vendor/peity/jquery.peity.min.js') }}"></script>

    <!-- Chart sparkline plugin files -->
    <script src="{{ asset('assets/control-panel/vendor/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Demo scripts -->
    <script src="{{ asset('assets/control-panel/js/dashboard/dashboard-3.js') }}"></script>

    <!-- Svganimation scripts -->
    <script src="{{ asset('assets/control-panel/vendor/svganimation/vivus.min.js') }}"></script>
    <script src="{{ asset('assets/control-panel/vendor/svganimation/svg.animation.js') }}"></script>
    <script src="{{ asset('assets/control-panel/js/styleSwitcher.js') }}"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}<script src="{{ asset('assets/tagsinput/bootstrap-tagsinput.js') }}"></script>
    <script>
        const userId = "{{ Auth::id() }}"
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type='text/javascript'>
        $(document).ready(function(){

            // Department Change
            $('#menu_id').change(function(){

                // Department id
                var id = $(this).val();
                //alert('hi');
                // Empty the dropdown
                // $('#sub_id').find('option').not(':first').remove();

                // AJAX request
                $.ajax({
                    url: '/control-panel/sub-menu/ajax/'+id,
                    type: 'get',
                    data: "json",
                    success: function(data){
                        $('select[name="subMenu_id"]').empty();
                        $.each(data,function (key,value){
                            // console.log(value.name)
                            $('select[name="subMenu_id"]').append('<option value="'+value.id+'">'+value.name+'</option>')
                        });

                    }
                });
            });
        });
    </script>
</body>

</html>
