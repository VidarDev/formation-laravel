@extends('base')

@section('title', 'Accueil du Blog')

@section('content')
    <h1 class="h1 text-center mt-2 mb-3">Mon Blog</h1>
    <div class="d-flex w-100 justify-content-around align-items-center my-4">
        <a class="btn btn-primary" href="{{ route('blog.create') }}">Créer un article</a>
    </div>
    <div class="mx-auto justify-content-center row row-gap-3 my-4">
        @foreach ($posts as $post)
            <article class="col-12 col-sm-6 col-lg-4">
                <div class="card h-100">
                    @if ($post->category)
                        <span class="position-absolute badge bg-info mx-2 my-2 z-1">Catégorie : {{ $post->category->name }}</span>
                    @endif
                    <img src="https://picsum.photos/400/300.webp/?blur=2" class="card-img-top ratio ratio-4x3" alt="...">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex w-100 gap-3 mb-2">
                            @if (!$post->tags->isEmpty())
                                @foreach ($post->tags as $tag)
                                    <span class="badge bg-secondary">{{ $tag->name }}</span>
                                @endforeach
                            @endif
                        </div>
                        <h2 class="card-title h5">{{ $post->title }}</h2>
                        <p class="card-text h-100">
                            {{ $post->content }}
                        </p>
                        <div class="mb-0 d-flex justify-content-between">
                            <a href="{{ route('blog.show', ['post' => $post->slug]) }}" class="btn btn-primary">
                                Lire la suite
                            </a>
                            <a href="{{ route('blog.edit', ['post' => $post->slug]) }}" class="btn btn-secondary d-inline-flex align-content-center justify-content-center">
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
            {{ $posts->links() }}
        </div>
    </div>
@endsection
