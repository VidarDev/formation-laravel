@extends('base')

@section('title', 'Accueil du Blog')

@section('content')
    <h1 class="h1 text-center mt-2 mb-3">Mon Blog</h1>
    <div class="mx-auto justify-content-center row my-5">
        @foreach ($posts as $post)
            <article class="col-12 col-sm-6 col-lg-4">
                <div class="card">
                    <img src="https://picsum.photos/400/300.webp/?blur=2" class="card-img-top ratio ratio-4x3" alt="...">
                    <div class="card-body">
                        <h2 class="card-title h5">{{ $post->title }}</h2>
                        <p class="card-text">
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
