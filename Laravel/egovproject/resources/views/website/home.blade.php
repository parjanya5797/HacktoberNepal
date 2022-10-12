<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mobile Lost Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="{{route('home')}}">Nepal Cyber Beuro</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{adminRedirectRoute('dashboard')}}">Dashboard</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('asset/2.png')}}" alt="Second slide">
                </div>
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset('asset/1.jpg')}}" alt="First slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="card">
            <div class="card-header">
                @if ($message = Session::get('success'))
                <div class="alert alert-info alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @isset($errors)
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $error }}</strong>
                </div>
                @endforeach
                @endisset
                <h4 class="card-title">
                    <span class="text-center">Mobile Lost Report</span>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{route('storeReport')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-2">
                                <label for="name">Name</label>
                                <div class="input-group">
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-2">
                                <label for="address">Address</label>
                                <div class="input-group">
                                    <input type="text" name="address" id="address" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-2">
                                <label for="contact">Contact</label>
                                <div class="input-group">
                                    <input type="text" name="contact" id="contact" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label for="imei1">imei1</label>
                                <div class="input-group">
                                    <input type="number" name="imei1" id="imei1" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label for="imei2">imei2</label>
                                <div class="input-group">
                                    <input type="number" name="imei2" id="imei2" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label for="lost_address">Phone Lost Possible Address</label>
                                <div class="input-group">
                                    <input type="text" name="lost_address" id="lost_address" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label for="lost_time">Phone Lost Estimated Date Time</label>
                                <div class="input-group">
                                    <input type="text" name="lost_time" id="lost_time" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label for="brand">Phone Brand</label>
                                <div class="input-group">
                                    <input type="text" name="brand" id="brand" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label for="model">Model</label>
                                <div class="input-group">
                                    <input type="text" name="model" id="model" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Report" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js">
    </script>
    <script>
        $('#lost_time').datetimepicker();
    </script>
</body>

</html>