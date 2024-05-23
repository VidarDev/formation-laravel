@extends('base')

@section('title', 'Modifier un auteur')

@section('content')
    <h1 class="h1 text-center mt-2 mb-3">Modification de {{ $author->firstname }} <span class="text-uppercase">{{ $author->lastname }}</span></h1>
    @include('author.form')
@endsection
