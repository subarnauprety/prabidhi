<!DOCTYPE html>
<html lang="en">

@include('admin.layout.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div id="fb-root"></div>

    <div class="wrapper">


        @include('admin.layout.navbar')

        @include('admin.layout.sidebar')

        <div class="content-wrapper" style="background:white;">
            @yield('content')
        </div>

    </div>

    @include('admin.layout.footer')
    // <!-- Your Chat Plugin code -->

</body>

</html>
