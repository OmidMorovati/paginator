<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link href="{{asset('vendor/omidmorovati/paginator/css/style.css')}}" rel="stylesheet">

    </head>
    <body>
    <main class="container">
{{--        <ul class="pagination justify-content-center mt-3">--}}
            {!!$paginate !!}
{{--        </ul>--}}
    </main>
    </body>
</html>
