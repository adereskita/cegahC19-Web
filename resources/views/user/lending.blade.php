@extends('layouts.app')


@section('content')

<style>
#pic-1 {
    background-color: #A7D7C5;
    background-image: url("assets/img/fever.png");
    background-size: 62px;
    background-position: bottom;
    background-repeat: no-repeat;
}
#pic-2 {
    background-color: #A7D7C5;
    background-image: url("assets/img/tired.png");
    background-size: 62px;
    background-position: bottom;
    background-repeat: no-repeat;
}
#pic-3 {
    background-color: #A7D7C5;
    background-image: url("assets/img/cough.png");
    background-size: 62px;
    background-position: bottom;
    background-repeat: no-repeat;
}

#pict-1 {
    background-color: #A7D7C5;
    background-image: url("assets/img/virus.png");
    background-size: 52px;
    background-position: center;
    background-repeat: no-repeat;
}

#pict-2 {
    background-color: #A7D7C5;
    background-image: url("assets/img/scale.png");
    background-size: 48px;
    background-position: center;
    background-repeat: no-repeat;
}

#pict-3 {
    background-color: #A7D7C5;
    background-image: url("assets/img/medical-report.png");
    background-size: 56px;
    background-position: right;
    background-repeat: no-repeat;
}
</style>

    <div class="container">
        <div class="section-one p-5">
            <h1>Jumlah Kasus Covid Indonesia</h1>
            <p>Hari {{$date}}</p>

            <div class="d-flex justify-content-start">
            <!-- foreach ($splitt as $splits)
            <div class="card shadow px-2 pt-2 mb-5 mt-3 bg-white rounded mx-3">
                    <h5 class="text-center font-weight-bold">$splits</h5>
            </div>
            <p>$covid['positif']</p>
            endforeach -->
            @foreach ($covids as $covid)

            <h1 class="text-center font-weight-bold text-info" style="font-size: 42pt;">{{$covid['positif']}}</h1>
            @endforeach

                <div class="float-right d-flex" style="margin-left: 350px; margin-top:50px">
                    <img class="img-fluid" src="{{asset('assets/img/human_home.svg')}}">
                </div>
            </div>
        </div>
        <h4 class="mt-2 ml-5 d-flex">Siap Tanggapi Wabah Covid-19</h4>

        <!-- lanjutin ini cara dapatin image nya gimana -->

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 290">
            <path fill="#e7008a" fill-opacity="1"
                d="M0,0L60,5.3C120,11,240,21,360,69.3C480,117,600,203,720,245.3C840,288,960,288,1080,261.3C1200,235,1320,181,1380,154.7L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
            </path>
        </svg>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="ml-5 col-md-6">
                    <!-- lanjutin ini cara dapatin image nya gimana -->
                <h4 class="text-start fw-bolder">Gejala Umum Covid</h4>
                <div class="d-flex justify-content-start">
                <div class="p-3">
                    <div class="card rounded-circle shadow" id="pic-1" style="width: 72px; height:72px;">
                        <!-- <img class="text-center" src="{{ asset('assets/img/fever.png') }}" style=""> -->
                    </div>
                        <p class="text-center">Demam</p>
                    </div>
                    <div class="p-3">
                        <div class="card rounded-circle shadow" id="pic-2" style="width: 72px; height:72px;">
                        </div>
                        <!-- <img src="{{ asset('assets/img/Ellipse.png') }}"> -->
                        <p class="text-center">Kelelahan</p>

                    </div>
                    <div class="p-3">
                        <div class="card rounded-circle shadow" id="pic-3" style="width: 72px; height:72px;">
                        </div>
                        <!-- <img src="{{ asset('assets/img/Ellipse.png') }}"> -->
                        <p class="text-center">Batuk Kering</p>

                    </div>
                </div>
                <a class="text-dark" href="artikel/gejalaCovid"><u>Pelajari lebih lanjut></u></a>
            </div>
            <div class="col-md-4">
                    <!-- lanjutin ini cara dapatin image nya gimana -->
                <h4 class="text-start fw-bolder">Cek Kesehatan Anda</h4>
                <div class="d-flex justify-content-start">
                    <a class="text-dark" href="/user">
                        <div class="p-3">
                            <!-- <img src="{{ asset('assets/img/Ellipse.png') }}"> -->
                            <div class="card rounded-circle shadow" id="pict-1" style="width: 72px; height:72px;">
                            </div>
                            <p class="text-center">Lapor Gejala</p>
                        </div>
                    </a>
                    <a class="text-dark" href="/bmi">
                        <div class="p-3">
                            <!-- <img src="{{ asset('assets/img/Ellipse.png') }}"> -->
                            <div class="card rounded-circle shadow" id="pict-2" style="width: 72px; height:72px;">
                            </div>
                            <p class="text-center">Kalkulator BMI</p>
                        </div>
                    </a>
                    <a class="text-dark" href="/artikel">
                        <div class="p-3">
                            <!-- <img src="{{ asset('assets/img/Ellipse.png') }}"> -->
                            <div class="card rounded-circle shadow" id="pict-3" style="width: 72px; height:72px;">
                            </div>
                            <p class="text-center">Informasi Kesehatan</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
    <a href="/artikel" class="float-right mr-3 text-dark">
        <u>Lihat Seluruhnya></u>
    </a>
    <h2 id="artikel">Baca Artikel Kesehatan</h2>
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4 mb-3">
                    <div class="card shadow bg-body rounded mx-1">
                        <img src="{{ asset('storage/' . $post->image) }}" class="img-artikel">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h6 class="card-subtitle font-weight-bold text-info text-capitalize">{{ $post->category->title }}</h6>
                                <h6 class="card-subtitle text-muted">{{ $post->created_at->format('d F, Y') }}</h6>
                            </div>
                            <h5 class="card-title mt-2">{{ Str::limit($post->title, '90', '.') }}</h5>
                        </div>
                    </div>
                    <a href="/lending/show/{{ $post->id }}" class="stretched-link"></a>
                </div>
            @endforeach
        </div>
    </div>

    @include('user.footer')

    <script>
    $(document).ready(function(){

    
    });
    </script>


@endsection
