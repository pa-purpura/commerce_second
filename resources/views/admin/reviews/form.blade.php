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
                <select class="form-select" aria-label="Default select example" name="product_id">
                    <option value="">Select one Product</option>
                    @foreach ($products as $product)
                        <option
                            @if (isset($review)) value="{{ old('product_id', $product->id) }}"
                                @selected($review->product_id == $product->id)
                                @else
                                value="{{ $product->id }}" @endif>
                            {{ $product->name }}
                        </option>
                    @endforeach
                    @error('product_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</div>
