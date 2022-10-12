@isset($most_watched_movies)
@if ($most_watched_movies->count() > 0)
<section class="pt-0 gen-section-padding-2">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <h4 class="gen-heading-title">Most Watched Shows</h4>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-inline-block">
                <div class="gen-movie-action">
                    <div class="gen-btn-container text-right">
                        <a href="{{route('mostWatchedMovies')}}" class="gen-button gen-button-flat">
                            <span class="text">More Videos</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="gen-style-2">
                    <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4"
                        data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false"
                        data-loop="false" data-margin="30">
                        @foreach ($most_watched_movies as $movie)
                        <div class="item">
                            <div
                                class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                                <div class="gen-carousel-movies-style-2 movie-grid style-2">
                                    <div class="gen-movie-contain">
                                        <div class="gen-movie-img">
                                            <img src="{{$movie->image}}" alt="
                                                                                owl-carousel-video-image">
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
                                                <a href="{{route('movie',['movie' => $movie->slug])}}" target="_blank"
                                                    class="gen-button">
                                                    <i class="fa fa-play"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="gen-info-contain">
                                            <div class="gen-movie-info">
                                                <h3><a href="{{route('movie',['movie' => $movie->slug])}}"
                                                        target="_blank">{{$movie->name
                                                        ?? "N/A"}}</a>
                                                </h3>
                                            </div>
                                            <div class="gen-movie-meta-holder">
                                                <ul>
                                                    <li>{{$movie->duration ?? "N/A"}} mins</li>
                                                    @isset($movie->categories)
                                                    @foreach ($movie->categories as $category)
                                                    <li>
                                                        <a href="{{route('category',['category' => $category->slug])}}"><span>{{$category->name
                                                                ??
                                                                "N/A"}}</span></a>
                                                    </li>
                                                    @endforeach
                                                    @endisset
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- #post-## -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endisset