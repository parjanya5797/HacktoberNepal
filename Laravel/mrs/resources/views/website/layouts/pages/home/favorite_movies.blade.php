@if (auth()->check())
@isset($favorite_movies)
@if($favorite_movies->count() > 0)
<section class="gen-section-padding-2 pt-0 pb-0">
    <div class="container">
        <div class="home-singal-silder">
            <div class="gen-nav-movies gen-banner-movies">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider slider-for">
                            <!-- Slider Items -->
                            @foreach ($favorite_movies as $favorite_movie)
                            <div class="slider-item" style="background: url('{{$favorite_movie->
                                image}}')">
                                <div class="gen-slick-slider h-100">
                                    <div class="gen-movie-contain h-100">
                                        <div class="container h-100">
                                            <div class="row align-items-center h-100">
                                                <div class="col-lg-6">
                                                    <div class="gen-movie-info">
                                                        <h3>{{$favorite_movie->name ?? "N/A"}}</h3>
                                                        <p>{{$favorite_movie->description ?? "N/A"}}
                                                        </p>

                                                    </div>
                                                    <div class="gen-movie-action">
                                                        <div class="gen-btn-container button-1">
                                                            <a class="gen-button"
                                                                href="{{route('movie',['movie' => $favorite_movie->slug])}}"
                                                                tabindex="0" target="_blank">
                                                                <i aria-hidden="true" class="ion ion-play"></i>
                                                                <span class="text">Play Now</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="slider slider-nav">
                            @foreach ($favorite_movies as $favorite_movie)
                            <div class="slider-nav-contain">
                                <div class="gen-nav-img">
                                    <img src="{{$favorite_movie->image}}" alt=" steamlab-image">
                                </div>
                                <div class="movie-info">
                                    <h3>{{$favorite_movie->name ?? "N/A"}}</h3>
                                    <div class="gen-movie-meta-holder">
                                        <ul>
                                            <li>{{$favorite_movie->duration ?? "N/A"}} mins</li>
                                            @isset($favorite_movie->categories)
                                            @foreach ($favorite_movie->categories as $category)
                                            <li>
                                                <a href="{{route('category',['category' => $category->slug])}}">
                                                    {{$category->name ?? "N/A"}} </a>
                                            </li>
                                            @endforeach
                                            @endisset
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endisset
@endif