<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                <a class="navbar-brand text-lowercase mr-lg-5" style="line-height: 0.94;" href="/"><img src="{{asset('img/logo.png')}}" alt="" height="60"></a>

                @auth
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/dashboard">
                               Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">
                               Logout
                            </a>
                        </li>
                    </ul>
                </div>
                @endauth
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <footer>
            <div class="container">
                <div class="row my-3">
                    <div class="col">
                        <small class="">© {{ now()->year }} Taylor Ivanoff Consulting</small>
                        <small class="text-secondary float-right">This site is protected by reCAPTCHA and the Google 
                            <a href="https://policies.google.com/privacy">Privacy Policy</a> and
                            <a href="https://policies.google.com/terms">Terms of Service</a> apply.
                        </small>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
