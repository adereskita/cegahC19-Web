@extends('layouts.app')


@section('content')
<div class="container mt-3">
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
</div>

    @include('user.footer')

    <script>
    $(document).ready(function(){

    
    });
    </script>


@endsection
