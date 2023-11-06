<!DOCTYPE html>
<html lang="en">


@include('users.partials.head')

<body>
    <div class="wrapper">
        @include('users.partials.sidebar')

        <div class="main">
            @include('users.partials.topbar')

            @yield('content')

            @include('users.partials.footer')
        </div>
    </div>

    <script src="{{ asset('template/js/app.js') }}"></script>

</body>

</html>
