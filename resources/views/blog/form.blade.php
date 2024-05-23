 <form action="" method="post" class="row col-12 col-md-10 row-gap-3 my-4 mx-auto">
    @csrf
    <div class="form-group col-12">
        <label for="title">Titre :</label>
        <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}">
        @error("title")
        {{ $message }}
        @enderror
    </div>
    <div class="form-group col-12">
        <label for="slug">Slug :</label>
        <input type="text" class="form-control" name="slug" value="{{ old('slug', $post->slug) }}">
        @error("slug")
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
