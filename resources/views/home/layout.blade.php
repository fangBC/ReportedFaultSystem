<!DOCTYPE html>
<html lang="en">
    <head>
        @include('shared.meta-tags')
        @yield('title')
        @include('home.partials.backend-css')
    </head>

    <body @if(Auth::check()) class="toggled sw-toggled" @endif style="margin-top: -15px;">
        @if (Auth::guest())
            @yield('login')
        @else
                @include('home.partials.header')
                @include('home.partials.sidebar-navigation')
                @yield('content')
                @include('home.partials.footer')
        @endif
        @include('home.partials.backend-js')
        @include('home.partials.search-js')
        @yield('unique-js')
    </body>
</html>
