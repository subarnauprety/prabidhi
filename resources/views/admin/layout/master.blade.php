<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@include('admin.layout.header')
<style>
    .note-editable ul {
        list-style: disc !important;
        list-style-position: inside !important;
    }

    .note-editable ol {
        list-style: decimal !important;
        list-style-position: inside !important;
    }
</style>

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
    //
    <!-- Your Chat Plugin code -->
    <script async src=“https://www.googletagmanager.com/gtag/js?id=G-DPF4M0R0KK”></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag(‘js’, new Date());
        gtag(‘config’, ‘G - DPF4M0R0KK’);
    </script>
</body>

</html>
