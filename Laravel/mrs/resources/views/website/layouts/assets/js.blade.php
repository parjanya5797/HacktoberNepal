<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('js/asyncloader.min.js')}}"></script>
<!-- JS bootstrap -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- owl-carousel -->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<!-- counter-js -->
<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('js/jquery.counterup.min.js')}}"></script>
<!-- popper-js -->
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/swiper-bundle.min.js')}}"></script>
<!-- Iscotop -->
<script src="{{asset('js/isotope.pkgd.min.js')}}"></script>

<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>

<script src="{{asset('js/slick.min.js')}}"></script>

<script src="{{asset('js/streamlab-core.js')}}"></script>

<script src="{{asset('js/toastr.min.js')}}"></script>

<script src="{{asset('js/script.js')}}"></script>

<script>
    $(function(){
        $(document).on('click','#movie',function(){
            var movie_id = $(this).data('movie_id');
            var user_id = $(this).data('user_id');
            var movie = $(this);

            $.get('{{route("favorite")}}',
            {
                movie_id:movie_id,
                user_id:user_id
            },function(data){
                toastr.info('Movie favorite toggled')
                movie.addClass(data.result ? 'text-danger' : '');
            });
        });
    });
</script>