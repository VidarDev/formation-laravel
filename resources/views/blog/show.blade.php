@extends('base')

@section('title', $post->title)

@section('content')
    <article>
        <h1 class="h1 text-center mt-2 mb-3">{{ $post->title }}</h1>
        <div class="row justify-content-center">
            <p class="col-12 col-md-8">
                {!! $post->content !!}
            </p>
        </div>
    </article>
@endsection
