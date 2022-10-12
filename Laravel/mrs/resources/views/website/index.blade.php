@extends('website.layouts.app')

@section('content')
<!-- owl-carousel Banner Start -->
@include('website.layouts.pages.home.sliders')
<!-- owl-carousel Banner End -->

<!-- owl-carousel Videos Section-1 Start -->
@include('website.layouts.pages.home.latest_movies')
<!-- owl-carousel Videos Section-1 End -->

<!-- owl-carousel Videos Section-2 Start -->
@include('website.layouts.pages.home.most_watched_movies')
<!-- owl-carousel Videos Section-2 End -->

<!-- Slick Slider start -->
@include('website.layouts.pages.home.favorite_movies')
<!-- Slick Slider End -->
<br>
<br>
<br>
@endsection