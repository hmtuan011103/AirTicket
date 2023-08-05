<!DOCTYPE html>
<html lang="en">

<head>
    @include('client.header')
</head>

<body>
    <!--Main Navigation-->
    <header>
        @include('client.header-content')
    <!--Main Navigation-->

    <!--Main layout-->
    <main>
        <div class="main">
            @yield('content')
        </div>
    </main>
    <!--Main layout-->

    <!-- Footer -->
    <footer class="page-footer font-small unique-color-dark">
        @include('client.footer')
    </footer>
    <!-- Footer -->
    <!-- jQuery -->
{{--    <script type="text/javascript" src="{{ asset("assets/js/jquery-3.7.0.min.js") }}"></script>--}}
{{--    <!-- Bootstrap tooltips -->--}}
{{--    <script type="text/javascript" src="{{ asset("assets/js/popper.min.js") }}></script>--}}
    <!-- Bootstrap core JavaScript -->
{{--    <script type="text/javascript" src="{{ asset("assets/js/bootstrap.min.js") }}></script>--}}
    <!-- MDB core JavaScript -->
{{--    <script type="text/javascript" src="{{ asset("assets/js/mdb.min.js") }}></script>--}}
    <!-- Your custom scripts -->
{{--    <script type="text/javascript" src="{{ asset("assets/js/script.js") }}></script>--}}
</body>

</html>
