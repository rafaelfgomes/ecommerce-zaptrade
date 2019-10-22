<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        @include('partials.dashboard._head')

    </head>

    <body>

        <div id="app">

            <main>

                @yield('content')
                
            </main>

        </div>

        @include('partials.dashboard._scripts')
    
    </body>
    
</html>
