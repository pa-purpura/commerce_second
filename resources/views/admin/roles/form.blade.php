<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Form</h3>
            <div class="tile-body">
                <div class="form-group">
                    <label class="control-label">Name</label>
                    <input class="form-control" type="text" placeholder="Enter name" name="name"
                        value="{{ old('name', isset($role) ? $role->name : '') }}">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <label for="permissions">Add Permissions:</label>
                <div class="form-group">
                    <select name="permissions[]" id="" multiple>
                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->id }}"
                               @if (Request::url() === 'http://127.0.0.1:8000/admin/roles/create')
                               @elseif ($role->hasPermissionTo($permission->id))
                               selected="selected"
                               @endif
                                >{{ $permission->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

