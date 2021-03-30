@extends('user.master_lending')

<section class="section-one top-70"></section>

@section('content')

    <section class="section-two bg-white py-3">
        <div class="container">
            <div>
                <h3>Artikel Kesehatan Terkini untuk Anda</h3>
                <hr>
            </div>
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4 mb-4"><img class="img-artikel" src="{{ asset('storage/' . $post->image) }}">
                    </div>
                    <div class="col-md-6"><span class="badge badge-primary">{{ $post->category->title }}</span>
                        <h4>{{ $post->title }}</h4>
                        <p>{{ $post->body }}</p><a class="link-bold" href="/lending/show/{{ $post->id }}">Baca
                            selengkapnya</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
