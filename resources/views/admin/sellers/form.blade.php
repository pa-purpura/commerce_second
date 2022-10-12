<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Form</h3>
            <div class="tile-body">
                <div class="form-group">
                    <label class="control-label">Name</label>
                    <input class="form-control" type="text" placeholder="Enter Name" name="name"
                        value="{{ old('name', isset($seller) ? $seller->name : '') }}">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label">Address</label>
                    <textarea class="form-control" placeholder="Enter address"
                        name="address">{{ old('address', isset($seller) ? $seller->address : '') }}</textarea>
                    @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</div>
