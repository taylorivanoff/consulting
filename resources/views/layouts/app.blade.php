<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property='og:title' content='Taylor Ivanoff Consulting'/>
    <meta property='og:image' content='{{ asset('img/dark.png') }}'/>
    <meta property='og:description' content='I help architects refine their portfolio websites to  win more clientele.'/>
    <meta property='og:url' content='https://taylorivanoff.com'/>

    <title>Appointment Booking</title>

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
       

        <main>
            @yield('content')
        </main>

        <footer>
            <div class="container">
                <div class="row my-3">
                    <div class="col-md-6 pb-3 pb-sm-0">
                        
                    </div>

                    <div class="col-md-6 pb-3 pb-sm-0">
                       
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
