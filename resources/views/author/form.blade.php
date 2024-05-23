<form action="" method="post" class="row col-12 col-md-10 row-gap-3 my-4 mx-auto">
    @csrf
    <div class="form-group col-12 col-md-6">
        <label for="title">Nom :</label>
        <input type="text" class="form-control" name="lastname" value="{{ old('lastname', $author->lastname) }}">
        @error("lastname")
        {{ $message }}
        @enderror
    </div>
    <div class="form-group col-12 col-md-6">
        <label for="title">Prénom :</label>
        <input type="text" class="form-control" name="firstname" value="{{ old('firstname', $author->firstname) }}">
        @error("firstname")
        {{ $message }}
        @enderror
    </div>
    @if ($author->id)
        <div class="form-group col-12">
            <label for="content">Slug :</label>
            <input type="text" class="form-control" name="slug" value="{{ old('slug', $author->slug) }}">
            @error("slug")
            {{ $message }}
            @enderror
        </div>
    @else
        <div class="form-group col-12 d-none">
            <label for="content">Slug :</label>
            <input type="hidden" class="form-control" name="slug" value="{{ old('slug', $author->slug) }}">
            @error("slug")
            {{ $message }}
            @enderror
        </div>
    @endif
    <div class="form-group col-12">
        <label for="content">Email :</label>
        <input type="email" class="form-control" name="email" value="{{ old('email', $author->email) }}">
        @error("email")
        {{ $message }}
        @enderror
    </div>
    <div class="form-group col-12">
        <label for="content">Description :</label>
        <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ old('description', $author->description) }}</textarea>
        @error("description")
        {{ $message }}
        @enderror
    </div>
    <div class="col-12">
        <button class="btn btn-primary mt-3 w-100">
            @if ($author->id)
                Modifier
            @else
                Créer
            @endif
        </button>
    </div>
</form>
