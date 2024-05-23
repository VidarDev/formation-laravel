@extends('base')

@section('title', 'Modifier un article')

@section('content')
    <h1 class="h1 text-center mt-2 mb-3">Modification de {{$post->title}}</h1>
    @include('blog.form')
@endsection
