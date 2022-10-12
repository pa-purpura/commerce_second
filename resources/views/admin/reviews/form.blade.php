<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Form</h3>
            <div class="tile-body">
                <div class="form-group">
                    <label class="control-label">Rating</label>
                    <input class="form-control" type="number" placeholder="Enter Rating" name="rating"
                        value="{{ old('rating', isset($review) ? $review->rating : '') }}">
                    @error('rating')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label">Description</label>
                    <textarea class="form-control" placeholder="Enter Description"
                        name="description">{{ old('description', isset($review) ? $review->description : '') }}</textarea>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</div>