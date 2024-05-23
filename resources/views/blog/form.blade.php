 <form action="" method="post" class="row col-12 col-md-10 row-gap-3 my-4 mx-auto">
    @csrf
    <div class="form-group col-12">
        <label for="title">Titre :</label>
        <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}">
        @error("title")
        {{ $message }}
        @enderror
    </div>
    <div class="form-group">
        <label for="slug">Slug :</label>
        <input type="text" class="form-control" name="slug" value="{{ old('slug', $post->slug) }}">
        @error("slug")
        {{ $message }}
        @enderror
    </div>
     <div class="form-group col-12 col-md-6">
         <label for="category_id">Catégorie :</label>
         <select name="category_id" id="category_id" class="form-control">
             <option value="">Sélectionner une catégorie</option>
             @foreach ($categories as $category)
                 <option @selected(old('category_id', $post->category_id) == $category->id) value="{{ $category->id }}">{{
                $category->name }}</option>
             @endforeach
         </select>
         @error("category_id")
         {{ $message }}
         @enderror
     </div>
     <div class="form-group col-12 col-md-6">
         <label for="author_id">Auteur :</label>
         <select name="author_id" id="author_id" class="form-control">
             <option value="">Sélectionner un auteur</option>
             @foreach ($authors as $author)
                 <option @selected(old('author_id', $post->author_id) == $author->id) value="{{ $author->id }}">{{
                $author->firstname . ' ' . $author->lastname }}</option>
             @endforeach
         </select>
         @error("author_id")
         {{ $message }}
         @enderror
     </div>
    @php
        $tagsIds = $post->tags()->pluck('id');
    @endphp
    <div class="form-group col-12">
         <label for="tag">Tags :</label>
         <select name="tags[]" id="tag" class="form-control" multiple>
             @foreach ($tags as $tag)
                 <option @selected($tagsIds->contains($tag->id)) value="{{ $tag->id }}">{{
                $tag->name }}</option>
             @endforeach
         </select>
         @error("tags")
         {{ $message }}
         @enderror
    </div>
    <div class="form-group col-12">
        <label for="content">Contenu :</label>
        <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{ old('content', $post->content) }}</textarea>
        @error("content")
        {{ $message }}
        @enderror
    </div>
    <div class="col-12">
        <button class="btn btn-primary mt-3 w-100">
            @if ($post->id)
                Modifier
            @else
                Créer
            @endif
        </button>
    </div>
</form>
