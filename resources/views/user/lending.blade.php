@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="section-one p-5">
            <h1>Kasus Covid Indonesia</h1>
            <!-- <p>Hari ini, Kamis 2 Januari 2021</p> -->
            <p>Hari {{$date}}</p>
        </div>
        
        <!-- lanjutin ini cara dapatin image nya gimana -->
        <img class="uk-margin-remove-right" src="{{url('img/virus.png')}}" width=30 height=30 alt="" uk-svg>

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
                        <img src="{{ asset('assets/img/Ellipse.png') }}">
                        <p class="text-center">Demam</p>
                    </div>
                    <div class="p-3">
                        <img src="{{ asset('assets/img/Ellipse.png') }}">
                        <p class="text-center">Kelelahan</p>

                    </div>
                    <div class="p-3">
                        <img src="{{ asset('assets/img/Ellipse.png') }}">
                        <p class="text-center">Batuk Kering</p>

                    </div>
                </div>
                <a href="artikel/gejalaCovid">Pelajari lebih lanjut ></a>
            </div>
            <div class="col-md-4">
                    <!-- lanjutin ini cara dapatin image nya gimana -->
                <h4 class="text-start fw-bolder">Cek Kesehatan Anda</h4>
                <div class="d-flex justify-content-start">
                    <div class="p-3">
                        <img src="{{ asset('assets/img/Ellipse.png') }}">
                        <p class="text-center">Lapor Gejala</p>
                    </div>
                    <div class="p-3">
                        <img src="{{ asset('assets/img/Ellipse.png') }}">
                        <p class="text-center">Kalkulator BMI</p>

                    </div>
                    <div class="p-3">
                        <img src="{{ asset('assets/img/Ellipse.png') }}">
                        <p class="text-center">Informasi Kesehatan</p>

                    </div>
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
