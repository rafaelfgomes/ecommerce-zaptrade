<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        @include('partials._head')

    </head>

    <body class="goto-here">

        @yield('content')
        
        @include('partials._scripts')

    </body>
    
</html>
