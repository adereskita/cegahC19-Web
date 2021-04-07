@extends('layouts.app')

@section('content')

    <section class="mt-2">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <span class="badge badge-primary">{{ $posts->category->title }}</span>
                    <span>{{ $posts->created_at->format('d F, Y') }}</span>
                    <h4>{{ $posts->title }}</h4>
                    <img class="w-100" src="{{ asset('storage/' . $posts->image) }}" />
                    <p>{{ $posts->body }}</p>
                </div>
            </div>
        </div>
    </section>

@endsection
