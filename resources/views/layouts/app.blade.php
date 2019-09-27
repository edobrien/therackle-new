<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="../img/fav.png">
    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>Recdirec</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.10/css/bootstrap-select.css">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <!-- Used for google recaptcha-->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <!-- Used for yajra datatables-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script>

    <!-- Bootstrap Multi-select -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.10/js/bootstrap-select.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="{{ asset('js/firm-search.js') }}"></script>

    @yield('head')
    @stack('scripts')
</head>
<body>
    <div id="app" ng-app="recdirecApp">
        <nav class="navbar navbar-expand-sm navbar-light navbar-border shadow static-top">
            <div class="container-fluid">
                <a class="navbar-brand py-0" href="{{ url('/home') }}">
                    <!-- {{ config('app.name', 'Laravel') }} -->
                    <img src="../img/logo.png" alt="Recdirec" width="130">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        @if (Auth::user()->is_active == "YES")
                            <li class="nav-item {{ Request::is('practice-area-guide') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/practice-area-guide') }}">Practice Area Guide</a>
                            </li>
                            <li class="nav-item {{ Request::is('interview-guide') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/interview-guide') }}">Interview / Resource Guides</a>
                            </li>
                            <li class="nav-item {{ Request::is('reports-analysis') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/reports-analysis') }}">Reports</a>
                            </li>
                            <li class="nav-item {{ Request::is('feedback-surveys') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/feedback-surveys') }}">Feedback</a>
                            </li>
                        @endif
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <!-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a> -->

                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <ion-icon name="ios-more" size="small" class="pt-1 text-grey"></ion-icon>
                                </a>

                                <div class="dropdown-menu rounded-0 mddp dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->is_admin == "YES")
                                    <a class="dropdown-item mt-1">
                                        <h5 class="text-blue m-0 p-0"><strong>{{ Auth::user()->name }}</strong></h5>
                                        <small class="text-muted">Administrator</small>
                                    </a>
                                    <hr class="style-dashed">
                                    <div class="row py-2 w-640">
                                        <div class="col-md-4 border-right pl-4">
                                            <a class="dropdown-item text-muted {{ Request::is('users') ? 'active' : '' }}" href="{{ url('/users') }}">
                                            Users
                                            </a>
                                            <a class="dropdown-item text-muted {{ Request::is('practice-area-guides') ? 'active' : '' }}" href="{{ url('/practice-area-guides') }}">
                                            Practice area guides
                                            </a>
                                            <a class="dropdown-item text-muted {{ Request::is('interview-guides') ? 'active' : '' }}" href="{{ url('/interview-guides') }}">
                                            Interview guides
                                            </a>
                                            <a class="dropdown-item text-muted {{ Request::is('survey') ? 'active' : '' }}" href="{{ url('/survey') }}">
                                            Survey
                                            </a>
                                            <a class="dropdown-item text-muted {{ Request::is('useful-links') ? 'active' : '' }}" href="{{ url('/useful-links') }}">
                                            Useful links
                                            </a>
                                            <a class="dropdown-item text-muted {{ Request::is('helpful-articles') ? 'active' : '' }}" href="{{ url('/helpful-articles') }}">
                                            Helpful articles
                                            </a>
                                            <a class="dropdown-item text-muted {{ Request::is('feedbacks') ? 'active' : '' }}" href="{{ url('/feedbacks') }}">
                                            Feedback
                                            </a>
                                            <a class="dropdown-item text-muted {{ Request::is('reports') ? 'active' : '' }}" href="{{ url('/reports') }}">
                                            Reports 
                                            </a>
                                        </div>
                                        <div class="col-md-4 border-right">
                                            <a class="dropdown-item text-muted {{ Request::is('upload-file') ? 'active' : '' }}" href="{{ url('/upload-file') }}">
                                            Upload File 
                                            </a>
                                            <a class="dropdown-item text-muted {{ Request::is('region') ? 'active' : '' }}" href="{{ url('/region') }}">
                                            Region
                                            </a>
                                            <a class="dropdown-item text-muted {{ Request::is('location') ? 'active' : '' }}" href="{{ url('/location') }}">
                                            Location
                                            </a>
                                            <a class="dropdown-item text-muted {{ Request::is('service') ? 'active' : '' }}" href="{{ url('/service') }}">
                                            Service
                                            </a>
                                            <a class="dropdown-item text-muted {{ Request::is('recruitment-type') ? 'active' : '' }}" href="{{ url('/recruitment-type') }}">
                                            Recruitment type
                                            </a>
                                            <a class="dropdown-item text-muted {{ Request::is('practice-area') ? 'active' : '' }}" href="{{ url('/practice-area') }}">
                                            Practice Area
                                            </a>
                                            <a class="dropdown-item text-muted {{ Request::is('sector') ? 'active' : '' }}" href="{{ url('/sector') }}">
                                            Sector
                                            </a>
                                        </div>
                                        <div class="col-md-4 pr-4">
                                            <a class="dropdown-item text-muted {{ Request::is('recruitment-firm') ? 'active' : '' }}" href="{{ url('/recruitment-firm') }}">
                                            Recruitment Firm
                                            </a>
                                            <a class="dropdown-item text-muted {{ Request::is('firm-location') ? 'active' : '' }}" href="{{ url('/firm-location') }}">
                                            Firm Location
                                            </a>
                                            <a class="dropdown-item text-muted {{ Request::is('firm-service') ? 'active' : '' }}" href="{{ url('/firm-service') }}">
                                            Firm Service
                                            </a>
                                            <a class="dropdown-item text-muted {{ Request::is('firm-recruitment-type') ? 'active' : '' }}" href="{{ url('/firm-recruitment-type') }}">
                                            Firm Recruitment Type
                                            </a>
                                            <a class="dropdown-item text-muted {{ Request::is('firm-client') ? 'active' : '' }}" href="{{ url('/firm-client') }}">
                                            Firm Client
                                            </a>
                                            <a class="dropdown-item text-muted {{ Request::is('firm-practice-area') ? 'active' : '' }}" href="{{ url('/firm-practice-area') }}">
                                            Firm Practice Area
                                            </a>
                                            <a class="dropdown-item text-muted {{ Request::is('firm-sector') ? 'active' : '' }}" href="{{ url('/firm-sector') }}">
                                            Firm Sector
                                            </a>
                                            <a class="dropdown-item text-muted {{ Request::is('firm-recruitment-region') ? 'active' : '' }}" href="{{ url('/firm-recruitment-region') }}">
                                            Firm Region
                                            </a>
                                        </div>
                                    </div>
                                    <hr class="style-dashed">
                                    @endif
                                    <a class="dropdown-item text-muted" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <button class="navbar-toggler sidebar-button" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
            <div class="container-fluid">
                @if (Auth::user()->is_active == "YES")
                <nav class="sidebar pt-3 pb-2 collapse navbar-collapse" id="sidebar" ng-controller="SearchDataController">
                    <button type="button" class="close" data-toggle="collapse" data-target="#sidebar" aria-expanded="false" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                        <span class="close"></span>
                    </button>
                    <form action="{{ url('/search-recruitment-firm') }}" method="POST">
                        @csrf
                    <div class="recruitment">
                        <p for="recruitmentFirm" class="text-dark mt-1 mb-2">Recruitment Firm Name</p>
                        <select ng-model="search_data.firm_id" name="firm_id"
                                ng-options="firm.id as firm.name for firm in search_firms track by firm.id">
                                <option value="">Any</option>
                        </select>
                    </div>
                    <div class="find-recruiters">
                        <p class="text-dark mb-1">Find Recruiters</p>
                        <label for="location">Location</label>
                        <select class="mb8" name="search_locations" 
                                ng-model="search_location"
                                ng-options="loc as loc.name group by loc.region.name for loc in search_locations track by loc.id">
                                <option value="">Any</option>
                        </select>
                        <label for="service">Service</label>
                        <select class="mb8" name="service_id" 
                                ng-model="search_data.service_id" 
                                ng-options="service.id as service.name for service in search_services track by service.id">
                                <option value="">Any</option>
                        </select>
                        <label for="roleType">Type of Role</label>
                        <select class="mb8" name="recruitment_id" 
                                ng-model="search_data.recruitment_id" 
                                ng-options="rt.id as rt.name for rt in search_roletypes track by rt.id">
                                <option value="">Any</option>
                        </select>
                        <label for="recruitmentSize">Size of Recruitment Firm</label>
                        <select class="mb8" ng-model="size" name="size" id="size">
                            <option value="">Any</option>
                            <option value="<?php echo \App\RecruitmentFirm::SIZE_SMALL; ?>"><?php echo \App\RecruitmentFirm::SIZE_SMALL_TEXT; ?></option>
                            <option value="<?php echo \App\RecruitmentFirm::SIZE_MEDIUM; ?>"><?php echo \App\RecruitmentFirm::SIZE_MEDIUM_TEXT; ?></option>
                            <option value="<?php echo \App\RecruitmentFirm::SIZE_LARGE; ?>"><?php echo \App\RecruitmentFirm::SIZE_LARGE_TEXT; ?></option>
                        </select>
                        <label for="practiceArea">Practice Area</label>
                        <select class="mb8" name="practice_area_id"
                                ng-model="search_data.practice_area_id" 
                                ng-options="area.id as area.name for area in search_areas  | filter: { type: 'SPECIAL' } track by area.id">
                                <option value="">General</option>
                        </select>
                        <label for="sector">Sector</label>
                        <select class="mb8" name="sector_id" 
                                ng-model="search_data.sector_id" 
                                ng-options="sector.id as sector.name group by sector.type for sector in search_sectors  | filter: { type: '!GENERAL' } track by sector.id">
                                <option value="">General</option>
                        </select>
                        <button type="submit" class="btn btn-sm bg-darkblue br-40 w-100">Search</button>
                        </form>
                    </div>
                </nav>
                @endif
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    <div raw-ajax-busy-indicator class="bg_load text-center" style="display: none !important;">
        <img src="/img/loader.gif" style="margin-top:25%;">
    </div>
     @if (session('firm_id'))
     <input type="text" style="display:none;" name="firm" id="firm" value="{{ session('firm_id') }}"><br>
     @endif
     @if (session('location_id'))
     <input type="text" style="display:none;" name="location" id="location" value="{{ session('location_id') }}"><br>
     @endif
     @if (session('service_id'))
     <input type="text" style="display:none;" name="service" id="service" value="{{ session('service_id') }}"><br>
     @endif
     @if (session('recruitment_id'))
     <input type="text" style="display:none;" name="recruitment" id="recruitment" value="{{ session('recruitment_id') }}"><br>
     @endif
     @if (session('firm_size'))
     <input type="text" style="display:none;" name="firm_size" id="firm_size" value="{{ session('firm_size') }}"><br>
     @endif
     @if (session('practice_area_id'))
     <input type="text" style="display:none;" name="practice_area" id="practice_area" value="{{ session('practice_area_id') }}"><br>
     @endif
     @if (session('sector_id'))
     <input type="text" style="display:none;" name="sector" id="sector" value="{{ session('sector_id') }}"><br>
    @endif
</body>
<script>
    
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
        $('#size').val($('#firm_size').val());
        $(document).ajaxStop(function () {
            $('.bg_load').hide();
        });

        $(document).ajaxStart(function () {
            $('.bg_load').show();
        });
    })
</script>
</html>
