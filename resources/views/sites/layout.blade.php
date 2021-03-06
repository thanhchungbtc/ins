<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Công ty TNHH Kiến trúc và kỹ thuật INS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('sites.shared._head')

</head>

<body id="homepage">

<div id="wrapper">

    <!-- header begin -->
    @include('sites.shared._header')
    <!-- header close -->

    <!-- content begin -->
    <div id="content" class="no-bottom no-top">
        <!-- page content -->
        @yield('content')
        <!-- footer begin -->
        @include('sites.shared._footer')
        <!-- footer close -->
    </div>
</div>
{{-- @include('sites.shared._scripts') --}}
<script src="/site/js/vendor.js"></script>
<!-- SLIDER REVOLUTION SCRIPTS  -->
<script src="/site/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script src="/site/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

@yield('scripts.footer')
</body>
</html>
