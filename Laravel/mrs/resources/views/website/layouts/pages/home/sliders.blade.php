@isset($featured_movies)
@if(count($featured_movies) > 0)
<section class="pt-0 pb-0">
    <div class="container-fluid px-0">
        <div class="row no-gutters">
            <div class="col-12">
                <div class="gen-banner-movies banner-style-2">
                    <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="1"
                        data-lap_num="1" data-tab_num="1" data-mob_num="1" data-mob_sm="1" data-autoplay="true"
                        data-loop="true" data-margin="0">
                        @foreach ($featured_movies as $featured_movie)
                        <div class="item" style="background: url('{{$featured_movie->image}}')">
                            <div class="gen-movie-contain-style-2 h-100">
                                <div class="container h-100">
                                    <div class="row flex-row-reverse align-items-center h-100">
                                        <div class="col-xl-6">
                                            <div class="gen-front-image">
                                                <img src="{{$featured_movie->image}}" alt=" owl-carousel-banner-image">
                                                <a href="{{$featured_movie->trailer}}"
                                                    class="playBut popup-youtube popup-vimeo popup-gmaps">
                                                    <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In  -->
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        width="213.7px" height="213.7px" viewBox="0 0 213.7 213.7"
                                                        enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                                                        <polygon class="triangle" id="XMLID_17_" fill="none"
                                                            stroke-width="7" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-miterlimit="10"
                                                            points="
                                                                                        73.5,62.5 148.5,105.8 73.5,149.1 "></polygon>
                                                        <circle class="circle" id="XMLID_18_" fill="none"
                                                            stroke-width="7" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-miterlimit="10" cx="106.8"
                                                            cy="106.8" r="103.3">
                                                        </circle>
                                                    </svg>
                                                    <span>Watch Trailer</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="gen-tag-line"><span>Check Out</span></div>
                                            <div class="gen-movie-info">
                                                <h3>{{$featured_movie->name ?? 'N/A'}}</h3>
                                            </div>
                                            <div class="gen-movie-meta-holder">
                                                <ul class="gen-meta-after-title">
                                                    <li class="gen-sen-rating">
                                                        <span>
                                                            {{$featured_movie->quality}}</span>
                                                    </li>
                                                </ul>
                                                <p>
                                                    @isset($featured_movie->description)
                                                    {!! $featured_movie->description !!}
                                                    @endisset
                                                </p>
                                                <div class="gen-meta-info">
                                                    <ul class="gen-meta-after-excerpt">
                                                        @isset($featured_movie->actors)
                                                        <li>
                                                            <strong>Cast :</strong>
                                                            @foreach ($featured_movie->actors as $actor)
                                                            {{($actor->name ?? "N/A") . ','}}
                                                            @endforeach
                                                        </li>
                                                        @endisset
                                                        @isset($featured_movie->categories)
                                                        <li>
                                                            <strong>Genre :</strong>
                                                            @foreach ($featured_movie->categories as $category)
                                                            <span>
                                                                <a
                                                                    href="{{route('category',['category' => $category->slug])}}">
                                                                    {{$category->name ?? "N/A"}}, </a>
                                                            </span>
                                                            @endforeach
                                                        </li>
                                                        @endisset
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="gen-movie-action">
                                                <div class="gen-btn-container">
                                                    <a href="{{route('movie',['movie' => $featured_movie->slug])}}"
                                                        target="_blank" class="gen-button .gen-button-dark">
                                                        <i aria-hidden="true" class="fas fa-play"></i> <span
                                                            class="text">Play
                                                            Now</span>
                                                    </a>
                                                </div>
                                            </div>
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
    </div>
</section>
@endif
@endisset