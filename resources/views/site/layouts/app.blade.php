<!DOCTYPE html>
<!--[if IE 9]> <html class="ie9 no-js" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LaraComp @yield('title')</title>
    <!-- <link rel="stylesheet" href="http://localhost:3000/css/bootstrap4/dist/css/bootstrap-custom.css?v=datetime"> -->
    <link rel="stylesheet" href="{{ asset('css/polished.min.css') }}">
    <!-- <link rel="stylesheet" href="polaris-navbar.css"> -->
    <link rel="stylesheet" href="{{ asset('iconic/css/open-iconic-bootstrap.min.css') }}">

    <link rel="icon" href="{{ asset('assets/polished-logo-small.png') }}">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>

    @stack('style')

    <style>
        .grid-highlight {
        padding-top: 1rem;
        padding-bottom: 1rem;
        background-color: #5c6ac4;
        border: 1px solid #202e78;
        color: #fff;
        }

        hr {
        margin: 6rem 0;
        }

        hr+.display-3,
        hr+.display-2+.display-3 {
        margin-bottom: 2rem;
        }
    </style>
    <script type="text/javascript">
        document.documentElement.className = document.documentElement.className.replace('no-js', 'js') + (document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#BasicStructure", "1.1") ? ' svg' : ' no-svg');
    </script>
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '564839313686027');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=564839313686027&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->

</head>

<body>

{{-- NavBar --}}
    
<nav class="navbar navbar-expand p-0">
    <a class="navbar-brand text-center col-xs-12 col-md-3 col-lg-2 mr-0" href="index.html">
        LARACOMP
    </a>
    <button class="btn btn-link d-block d-md-none text-white" data-toggle="collapse" data-target="#sidebar-nav" role="button" >
        MENU
    </button>
    
    @if( auth()->user() )
    <div class="d-none d-md-block w-50 ml-3 mr-2">
        <i class="oi oi-calendar mr-2 text-white"></i><span class="time text-white">{{ \Carbon\Carbon::now()->format('Y-m-d') }}</span>
    </div>
    @endif

    @if( auth()->user() )
    <div class="dropdown d-none d-md-block">
        <img class="d-none d-lg-inline rounded-circle ml-1" width="32px" src="{{ asset('assets/gorilla.jpg') }}" alt="FN"/>
        <button class="btn btn-link btn-link-primary dropdown-toggle" id="navbar-dropdown" data-toggle="dropdown">
        {{ Auth::user()->name }}
        </button>
        <div class="dropdown-menu dropdown-menu-right" id="navbar-dropdown">
            <a href="{{ route('my-profile', Auth::user()->id) }}" class="dropdown-item">Profile</a>
            <a href="#" class="dropdown-item">Setting</a>
            <div class="dropdown-divider"></div>
            <form action="{{ route("logout") }}" method="POST">
                @csrf
                <button class="dropdown-item" style="cursor:pointer">Sign Out</button>
            </form>
        </div>
    </div>
    @endif
</nav>

{{-- SideBar --}}

@if(auth()->user())
<div class="container-fluid h-100 p-0">
    <div style="min-height: 100%" class="flex-row d-flex align-items-stretch m-0">
        <div class="polished-sidebar bg-light col-12 col-md-3 col-lg-2 p-0 collapse d-md-inline" id="sidebar-nav">

            <ul class="polished-sidebar-menu ml-0 pt-4 p-0 d-md-block">
                <input class="border-dark form-control d-block d-md-none mb-4" type="text" placeholder="Search" aria-label="Search" />
                <li>
                    <a href="{{ route('dashboard') }}"><span class="oi oi-dashboard"></span> Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('company.index') }}"><span class="oi oi-home"></span> Company</a>
                </li>
                <li>
                    <a href="{{ route('users.index') }}"><span class="oi oi-people"></span> Users</a>
                </li>
                <li>
                    <a href="{{ route('team.index') }}"><span class="oi oi-sun"></span> Team</a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}"><span class="oi oi-laptop"></span> Product</a>
                </li>
                <li>
                    <a href="{{ route('pricing.index') }}"><span class="oi oi-dollar"></span> Pricing</a>
                </li>
                <li>
                    <a href=""><span class="oi oi-signpost"></span> News</a>
                </li>
                <li>
                    <a href=""><span class="oi oi-tag"></span> Category News</a>
                </li>
                <div class="d-block d-md-none">
                    <div class="dropdown-divider"></div>
                    <li><a href="{{ route('my-profile', Auth::user()->id) }}"> Profile</a></li>
                    <li><a href="#"> Setting</a></li>
                    <div class="dropdown-divider"></div>           
                    <li>
                        <form action="{{ route("logout") }}" method="POST">
                            @csrf
                            <button class="dropdown-item" style="cursor:pointer">Sign Out</button>
                        </form>           
                    </li>  
                </div>
            </ul>
            <div class="pl-3 d-none d-md-block position-fixed" style="bottom: 0px">
                <span class="oi oi-cog"></span> Setting
            </div>
        </div>
        @endif
            <div class="col-lg-10 col-md-9 p-4">
                <div class="row h-100">
                    <div class="col-md-12 pl-3 pt-2">
                        <div class="pl-3">
                            <h3>@yield('page-title')</h3>
                            <div>
                                @yield('content-page')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
    <!-- DataTables -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
   
    @stack('script')

</body>

</html>