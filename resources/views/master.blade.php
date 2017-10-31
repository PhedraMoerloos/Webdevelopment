<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Competition Yuppie</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/master.css">

    </head>
    <body>

        <div class="flex-center position-ref full-height">


            

            <div class="content">
                @yield('content')
                @include('partials.footer')
            </div>


        </div>


    </body>
</html>
