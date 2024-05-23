@extends('base')

@section('title', 'Listes des auteurs')

@section('content')
    <h1 class="h1 text-center mt-2 mb-3">Listes des auteurs</h1>
    <div class="d-flex w-100 justify-content-around align-items-center my-4">
        <a class="btn btn-primary" href="{{ route('author.create') }}">Créer un auteur</a>
    </div>
    <div class="mx-auto justify-content-center row row-gap-3 my-4">
        @foreach ($authors as $author)
            <article class="col-12 col-sm-6 col-lg-4">
                <div class="card h-100">
                    <img src="https://picsum.photos/400/300.webp/?blur=2" class="card-img-top ratio ratio-4x3" alt="...">
                    <div class="card-body d-flex flex-column">
                        <h2 class="card-title h5">{{ $author->firstname }} <span class="text-uppercase">{{ $author->lastname }}</span></h2>
                        <p class="card-text mb-2 text-primary-emphasis">
                            {{ $author->email }}
                        </p>
                        <p class="card-text h-100">
                            {{ $author->description }}
                        </p>
                        <div class="mb-0 d-flex justify-content-between">
                            <a href="{{ route('author.show', ['author' => $author->slug]) }}" class="btn btn-primary">
                                Lire la suite
                            </a>
                            <a href="{{ route('author.edit', ['author' => $author->slug]) }}" class="btn btn-secondary d-inline-flex align-content-center justify-content-center">
                                <span class="iconoir-edit-pencil p-1"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
    <div class="pagination row justify-content-end">
        <div class="col-12">
            {{ $authors->links() }}
        </div>
    </div>
@endsection
