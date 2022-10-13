<div class="tile-body">
    {{-- <div class="mb-3">
        <div class="form-group">
            <label class="control-label">Image</label>

            @if (isset($wishlist) ? $user->img_name : false)
                <figure class="col-10 rounded-circle">
                    <img class="img-fluid" src="{{ asset('storage/' . $user->img_name) }}" alt="profile_user">
                </figure>
            @endif
            <input class="form-control" name="icon" type="file">
            @error('icon')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div> --}}
    
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>

        <input type="text" class="form-control" name="name" placeholder="Write here your wishlists name"
            value="{{ old('name', isset($wishlist) ? $wishlist->name : '') }}">

        @error('name')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

</div>
