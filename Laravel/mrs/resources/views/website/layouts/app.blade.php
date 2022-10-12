<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="description" content="Streamlab - Video Streaming HTML5 Template" />
    <meta name="author" content="StreamLab" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Streamlab - Video Streaming HTML5 Template</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">
    @include('website.layouts.assets.css')
</head>

<body>

    <!--=========== Loader =============-->
    <div id="gen-loading">
        <div id="gen-loading-center">
            <img src="{{asset('images/logo.ico')}}" alt="loading">
        </div>
    </div>
    <!--=========== Loader =============-->

    <!--========== Header ==============-->
    @if ($include_menu ?? true)
    @include('website.layouts.components.menu')
    @endif
    <!--========== Header ==============-->
    {{-- Content --}}
    @yield('content')


    <!-- footer start -->
    @if ($include_footer ?? true)
    @include('website.layouts.components.footer')
    @endif
    <!-- footer End -->

    <!-- Back-to-Top start -->
    <div id="back-to-top">
        <a class="top" id="top" href="#top"> <i class="ion-ios-arrow-up"></i> </a>
    </div>
    <!-- Back-to-Top end -->

    <!-- js-min -->

    @include('website.layouts.assets.js')

</body>

</html>