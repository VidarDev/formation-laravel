<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Author;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        return view('blog.index', [
            'posts' => Post::orderBy('id', 'desc')->paginate(3)
        ]);
    }

    public function show(Post $post): RedirectResponse | View
    {
        // On check le slug
        // if ($post->slug != $slug) {
        //     return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        // }
        return view('blog.show', [
            'post' => $post,
        ]);
    }

    public function create()
    {
        $post = new Post();
        return view('blog.create', [
            'post' => $post,
            'categories' => Category::select('id', 'name')->get(),
            'tags' => Tag::select('id', 'name')->get(),
            'authors' => Author::select('id', 'lastname', 'firstname')->get(),
        ]);
    }
    // pour le moment cette méthode ne renvoi qu'une vue

    public function store(CreatePostRequest $request)
    {
        $post = Post::create($request->validated());
        $post->tags()->sync($request->validated('tags'));

        return redirect()->route('blog.show', ['post' => $post->slug])->with('success', "L'article a bien été sauvegardé");
    }

    public function edit(Post $post)
    {
        return view('blog.edit', [
            'post' => $post,
            'categories' => Category::select('id', 'name')->get(),
            'tags' => Tag::select('id', 'name')->get(),
            'authors' => Author::select('id', 'lastname', 'firstname')->get(),
        ]);
    }

    public function update(Post $post, CreatePostRequest $request)
    {
        $post->update($request->validated());
        $post->tags()->sync($request->validated('tags'));

        return redirect()->route('blog.show', ['post' => $post->slug])->with('success', "L'article a bien été modifié");
    }
}
