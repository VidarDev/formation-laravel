<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAuthorRequest;
use App\Models\Author;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthorController extends Controller
{
    public function index(): View
    {
        return view('author.index', [
            'authors' => Author::paginate(3)
        ]);
    }

    public function show(Author $author): RedirectResponse | View
    {
        return view('author.show', [
            'author' => $author
        ]);
    }

    public function create()
    {
        $author = new Author();
        return view('author.create', [
            'author' => $author
        ]);
    }

    public function store(CreateAuthorRequest $request)
    {
        $author = Author::create($request->validated());

        return redirect()->route('author.show', ['author' => $author->slug])->with('success', "L'auteur a bien été sauvegardé");
    }

    public function edit(Author $author)
    {
        return view('author.edit', [
            'author' => $author
        ]);
    }

    public function update(Author $author, CreateAuthorRequest $request)
    {
        $author->update($request->validated());

        return redirect()->route('author.show', ['author' => $author->slug])->with('success', "L'auteur a bien été modifié");
    }
}
