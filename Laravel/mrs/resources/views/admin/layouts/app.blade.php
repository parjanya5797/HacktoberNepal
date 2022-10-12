<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/select2/select2.css') }}">
    <link rel="stylesheet" href="{{asset('assets/datepicker/datepicker.css')}}">


</head>

<body>
    <div class="container-fluid p-3">
        <div class="row">
            <div class="col-lg-2">
                {{-- Side Menu --}}
                @include('admin.layouts.sidemenu')
            </div>
            <div class="col-lg-10">
                {{-- Flash Message --}}
                @include('admin.layouts.flash')
                {{-- Error Alerts --}}
                @include('admin.layouts.error')
                {{-- Content --}}
                @yield('content')
            </div>
        </div>
    </div>

    {{-- Bootstrap --}}
    <script src="{{asset('assets/jquery/jquery.slim.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/select2/select2.js')}}"></script>
    <script src="{{asset('assets/datepicker/datepicker.js')}}"></script>

    <script>
        $(function(){
            $('#categories').select2({
                placeholder: "Select a categories",
            });
            $('#actors').select2({
                placeholder: "Select a actors",
            });
            $('#release_date').datepicker({
                format: 'yyyy-mm-dd',
            });
        });
    </script>

    {{-- CK Editor --}}
    <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>
</body>

</html>