@extends('website.layouts.app')

@section('content')
<!-- Single movie Start -->
<section class="gen-section-padding-3 gen-single-movie">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-12">
                <div class="gen-single-movie-wrapper style-1">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="gen-video-holder">
                                @if (isset($movie->source))
                                {!! $movie->embeded_source !!}
                                @endif
                            </div>
                            <div class="gen-single-movie-info">
                                <h2 class="gen-title">{{$movie->name ?? "N/A"}}</h2>
                                <div class="gen-single-meta-holder">
                                    <ul>
                                        <li class="gen-sen-rating">{{$movie->quality ?? "N/A"}}</li>
                                        <li>
                                            <i class="fas fa-eye">
                                            </i>
                                            <span>{{views($movie)->count()}} Views</span>
                                        </li>
                                    </ul>
                                </div>
                                <p>
                                    @isset($movie->description)
                                    {!! $movie->description !!}
                                    @endisset
                                </p>
                                <div class="gen-after-excerpt">
                                    <div class="gen-extra-data">
                                        <ul>
                                            @isset($movie->categories)
                                            <li><span>Genre :</span>
                                                @foreach ($movie->categories as $category)
                                                <span>
                                                    <a href="{{route('category',['category' => $category->slug])}}">
                                                        {{$category->name}}, </a>
                                                </span>
                                                @endforeach
                                            </li>
                                            @endisset
                                            <li><span>Run Time :</span>
                                                <span>{{$movie->duration ?? "N/A"}} mins</span>
                                            </li>
                                            <li>
                                                <span>Release Date :</span>
                                                <span>{{$movie->release_date}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @isset($recommendeded_movies)
                        @if (isset($recommendeded_movies))
                        <div class="col-lg-12">
                            <div class="pm-inner">
                                <div class="gen-more-like">
                                    <h5 class="gen-more-title">Movie Recommendation :-</h5>
                                    <div class="row">
                                        @foreach ($recommendeded_movies as $recommendeded_movie)
                                        <div class="col-xl-3 col-lg-4 col-md-6">
                                            <div class="gen-carousel-movies-style-3 movie-grid style-3">
                                                <div class="gen-movie-contain">
                                                    <div class="gen-movie-img">
                                                        <img src="{{$recommendeded_movie->image}}"
                                                            alt="streamlab-image">
                                                        @if (auth()->check())
                                                        <div class="gen-movie-add">
                                                            <div class="wpulike wpulike-heart">
                                                                <div
                                                                    class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                                    <button type="button" id="movie"
                                                                        data-movie_id="{{$recommendeded_movie->id}}"
                                                                        data-user_id="{{auth()->check() ? auth()->user()->id : null}}"
                                                                        class="wp_ulike_btn wp_ulike_put_image {{$recommendeded_movie->isLikedByUser(auth()->check() ? auth()->user()->id : null) ? 'text-danger' : ''}}"></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        <div class="gen-movie-action">
                                                            <a href="{{route('movie',['movie' => $recommendeded_movie->slug])}}"
                                                                class="gen-button">
                                                                <i class="fa fa-play"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="gen-info-contain">
                                                        <div class="gen-movie-info">
                                                            <h3><a
                                                                    href="{{route('movie',['movie' => $recommendeded_movie->slug])}}">{{$recommendeded_movie->name
                                                                    ??
                                                                    "N/A"}}</a>
                                                            </h3>
                                                        </div>
                                                        <div class="gen-movie-meta-holder">
                                                            <li>{{$recommendeded_movie->duration ?? "N/A"}} mins</li>
                                                            @isset($recommendeded_movie->categories)
                                                            @if ($recommendeded_movie->categories->count() > 0)
                                                            <ul>
                                                                @foreach ($recommendeded_movie->categories as $category)
                                                                <li>
                                                                    <a href="{{route('category',['category' => $category->slug])}}"
                                                                        target="_blank"><span>{{$category->name ??
                                                                            "N/A"}}</span></a>
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
                            </div>
                        </div>
                        @endif
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Single movie End -->
@endsection