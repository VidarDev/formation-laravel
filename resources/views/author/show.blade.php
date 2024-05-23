@extends('base')

@section('title', $author->firstname . ' ' . $author->lastname)

@section('content')
    <article>
        <h1 class="h1 text-center mt-2 mb-3">{{ $author->firstname }} <span class="text-uppercase">{{ $author->lastname }}</span></h1>
        <div class="row justify-content-center">
            <p class="col-12 col-md-8 text-primary-emphasis">
                {!! $author->email !!}
            </p>
            <p class="col-12 col-md-8">
                {!! $author->description !!}
            </p>
        </div>
    </article>
@endsection
