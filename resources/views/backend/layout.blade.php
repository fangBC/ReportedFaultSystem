<!DOCTYPE html>
<html lang="en">
    <head>
        @include('shared.meta-tags')
        @yield('title')
        @include('backend.partials.backend-css')
    </head>

    <body @if(Auth::check()) class="toggled sw-toggled" @endif style="margin-top: -15px;">
        @if (Auth::guest())
            @yield('login')
        @else
                @include('backend.partials.header')
                @include('backend.partials.sidebar-navigation')
                @yield('content')
                @include('backend.partials.footer')
        @endif
        @include('backend.partials.backend-js')
        @include('backend.partials.search-js')
        @yield('unique-js')
    </body>
</html>
