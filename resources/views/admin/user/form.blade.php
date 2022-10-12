<div class="tile-body">
    {{-- <div class="mb-3">
        <div class="form-group">
            <label class="control-label">Image</label>

            @if (isset($user) ? $user->img_name : false)
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

        <input type="text" class="form-control" name="name" placeholder="Write here your name"
            value="{{ old('name', isset($user) ? $user->name : '') }}">

        @error('name')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="surname" class="form-label">Surname</label>

        <input type="text" class="form-control" name="surname" placeholder="Write here your surname"
            value="{{ old('surname', isset($user) ? $user->surname : '') }}">

        @error('surname')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="birthdate" class="form-label">Birthdate</label>

        <input type="date" class="form-control" name="birthdate" placeholder="Write here your birthdate"
            value="{{ old('birthdate', isset($user) ? $user->birthdate : '') }}">

        @error('birthdate')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Address</label>

        <input type="text" class="form-control" name="address" placeholder="Write here your address"
            value="{{ old('address', isset($user) ? $user->address : '') }}">

        @error('address')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>

        <input type="email" class="form-control" name="email" placeholder="Write here your email"
            value="{{ old('email', isset($user) ? $user->email : '') }}">

        @error('email')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>

        <input type="password" class="form-control" name="password" placeholder="Write here your password"
            value="{{ old('password', isset($user) ? $user->password : '') }}">

        @error('password')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
</div>
