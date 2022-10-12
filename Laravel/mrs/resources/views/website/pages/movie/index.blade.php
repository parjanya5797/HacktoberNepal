@extends('website.layouts.app')

@section('content')
<!-- breadcrumb -->
<div class="gen-breadcrumb" style="background-image: url('images/background/asset-25.jpeg');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <div class="gen-breadcrumb-title">
                        <h1>
                            Movies
                        </h1>
                    </div>
                    <div class="gen-breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"><i
                                        class="fas fa-home mr-2"></i>Home</a>
                            </li>
                            <li class="breadcrumb-item active">{{$title ?? "Movies"}}</li>
                        </ol>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb -->

<!-- Section-1 Start -->
@isset($movies)
@if ($movies->count() > 0)
<section class="gen-section-padding-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @foreach ($movies as $movie)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="gen-carousel-movies-style-3 movie-grid style-3">
                            <div class="gen-movie-contain">
                                <div class="gen-movie-img">
                                    <img src="{{$movie->image}}" alt="streamlab-image">
                                    @if (auth()->check())
                                    <div class="gen-movie-add">
                                        <div class="wpulike wpulike-heart">
                                            <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                <button type="button" id="movie" data-movie_id="{{$movie->id}}"
                                                    data-user_id="{{auth()->check() ? auth()->user()->id : null}}"
                                                    class="wp_ulike_btn wp_ulike_put_image {{$movie->isLikedByUser(auth()->check() ? auth()->user()->id : null) ? 'text-danger' : ''}}"></button>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="gen-movie-action">
                                        <a href="{{route('movie',['movie' => $movie->slug])}}" class="gen-button">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                        <h3><a href="{{route('movie',['movie' => $movie->slug])}}">{{$movie->name ??
                                                "N/A"}}</a>
                                        </h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                        <li>{{$movie->duration ?? "N/A"}} mins</li>
                                        @isset($movie->categories)
                                        @if ($movie->categories->count() > 0)
                                        <ul>
                                            @foreach ($movie->categories as $category)
                                            <li>
                                                <a href="{{route('category',['category' => $category->slug])}}"
                                                    target="_blank"><span>{{$category->name ?? "N/A"}}</span></a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                        @endisset
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="gen-pagination">
                    {{$movies->links()}}
                    {{-- <nav aria-label="Page navigation">
                        <ul class="page-numbers">
                            <li><span aria-current="page" class="page-numbers current">1</span></li>
                            <li><a class="page-numbers" href="#">2</a></li>
                            <li><a class="page-numbers" href="#">3</a></li>
                            <li><a class="next page-numbers" href="#">Next page</a></li>
                        </ul>
                    </nav> --}}
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endisset
<!-- Section-1 End -->
@endsection