<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title></title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/mystyle.css') }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>

    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ URL::to('/') }}/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ URL::to('/') }}/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ URL::to('/') }}/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::to('/') }}/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ URL::to('/') }}/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ URL::to('/') }}/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ URL::to('/') }}/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ URL::to('/') }}/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::to('/') }}/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ URL::to('/') }}/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::to('/') }}/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ URL::to('/') }}/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::to('/') }}/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ URL::to('/') }}/images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>
<body style="overflow: hidden;">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <img src="{{ URL::to('/') }}/images/logo.png" alt="logo" style="width: 12rem;" class="mt-5 mb-1">
                    <h1 style="font-size: 4rem;" class="mb-0">
                        Welcome to {{config('app.name')}} 
                    </h1>
                    <h1 style="font-size: 8rem;" class="mb-5">
                        <strong>Commander!</strong>
                    </h1>
                    <hr>
                    <h1 class="mt-5 mb-1">
                        Join us to discuss anything!
                    </h1>
                    <h3 class="mb-5">
                        (yes, absolutely anything!)
                    </h3>
                    <a href="{{ route('login') }}" class="btn btn-success btn-lg btn-homepage mr-3 mb-5">Login</a><a href="{{ route('register') }}" class="btn btn-primary btn-lg btn-homepage mb-5">Register</a>
                </div>
            </div>
        </div>
    </main>
    <script>
        var currentTitle = 'Welcome to Readit!';
        document.title = 'ReadIt | ' + currentTitle;
    </script>
    <footer>
        <div class="footer w-100">

        </div>
        <div class="copyright w-100">
            <center>&copy; 2020 ReadIt. Proudly made with love.</center>
        </div>
    </footer>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>