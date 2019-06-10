<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property='og:title' content='Taylor Ivanoff Consulting'/>
    <meta property='og:image' content='{{ asset('img/dark.png') }}'/>
    <meta property='og:description' content='I help architects refine their portfolio websites to  win more clientele.'/>
    <meta property='og:url' content='{{ route('home') }}'/>

    <title>Portfolio Website Consulting, Implementation, Evaluation | Taylor Ivanoff Consulting</title>

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://www.google.com/recaptcha/api.js?render=6LdnrKUUAAAAACvmK8aHytfwDvGOOT_c6a-sBxUb"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-133486425-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-133486425-2');
    </script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand text-lowercase mr-lg-5" href="/"><img src="{{ asset('img/logo.png') }}" alt="Taylor Ivanoff Consulting" height="60"></a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="/contact">Contact</a>
                        </li> 
                    </ul>
                    
                    <ul class="navbar-nav ml-auto">
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if(auth()->user()->name)
                                        {{auth()->user()->name}}
                                    @else
                                        Account
                                    @endisset
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>
                                    @role('admin')
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin</a>
                                    @endrole
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('auth.logout') }}">Logout</a>
                                </div>
                            </li>
                        @endauth

                        @guest
                            @unless (request()->is('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                       Login
                                    </a>
                                </li>
                            @endunless
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <footer>
            <div class="container">
                <div class="row my-3">
                    <div class="col-md-6">
                        <small class="text-secondary"><span class="align-middle">©</span> {{ now()->year }} <a href="https://abr.business.gov.au/ABN/View?abn=13633865362">Taylor Ivanoff Consulting</a></small>
                    </div>

                    <div class="col-md-6">
                        <small class="text-secondary">This site is protected by reCAPTCHA and the Google 
                            <a href="https://policies.google.com/privacy">Privacy Policy</a> and
                            <a href="https://policies.google.com/terms">Terms of Service</a> apply.
                        </small>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
