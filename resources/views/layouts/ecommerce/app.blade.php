<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        @include('partials.ecommerce._head')

    </head>

    <body class="goto-here">

        @yield('content')
        
        @include('partials.ecommerce._scripts')

    </body>
    
</html>
