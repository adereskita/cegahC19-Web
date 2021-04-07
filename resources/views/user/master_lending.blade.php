<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>CegahCovid2</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>

<body>

    <nav class="navbar navbar-light navbar-expand-md fixed-top bg-nav-shadow">
        <div class="container-fluid">
            <div class="container"><img src="{{ asset('/assets/img/brand.png') }}"><button data-toggle="collapse"
                    class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link active" href="#">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Second Item</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Third Item</a></li>
                        <li class="nav-item"><a class="btn btn-outline-primary mr-2" role="button"
                                href="/lending/login">Masuk</a></li>
                        <li class="nav-item"><button class="btn btn-primary" type="button">Download Aplikasi</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>



    @yield('content')

    <footer></footer>





    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
