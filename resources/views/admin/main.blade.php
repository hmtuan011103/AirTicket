
<!DOCTYPE html>

<html lang="en">

<head>
    @include('admin.header')
</head>

<body>

    <div class="wrapper">
        @include('admin.sidebar')
        <div class="main-panel">
            @yield('content')
        </div>
    </div>

</body>
    @include('admin.footer')
</html>
