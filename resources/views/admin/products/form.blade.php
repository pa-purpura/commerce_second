<div class="form-group row">
    <label class="control-label col-md-3">Nome prodotto</label>
    <div class="col-md-8">
        <input class="form-control" name="name" value="{{ old('name', isset($product) ? $product->name : '') }}"
            type="text" placeholder="Inserisci nome del prodotto">
    </div>
</div>
@error('name')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group row">
    <label class="control-label col-md-3">Descrizione</label>
    <div class="col-md-8">
        <textarea class="form-control" name="description" rows="4" placeholder="Inserisci descrizione">{{ old('description', isset($product) ? $product->description : '') }}</textarea>
    </div>
</div>
@error('description')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group row">
    <label class="control-label col-md-3">Prezzo</label>
    <div class="col-md-8">
        <input type="number" name="price" min="1" step="any"
            value="{{ old('price', isset($product) ? $product->price : '') }}" class="form-control"
            placeholder="Inserisci prezzo">
    </div>
</div>
@error('price')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group row">
    <label class="control-label col-md-3">Stock</label>
    <div class="col-md-8">
        <input type="number" name="stock" value="{{ old('stock', isset($product) ? $product->stock : '') }}"
            class="form-control" placeholder="Inserisci stock">
    </div>
</div>
@error('stock')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group row">
    <label class="control-label col-md-3">Immagine prodotto</label>
    <div class="col-md-8">
        <input class="form-control" type="file" name="image">
    </div>
</div>
@error('image')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group row">
<label class="control-label col-md-3">Venditore</label>
<select class="form-select" aria-label="Default select example" name="seller_id">
    <option value="">Select one Product</option>
    @foreach ($sellers as $seller)
        <option
            @if (isset($product)) value="{{ old('seller_id', $seller->id) }}"
                        @selected($product->seller_id == $seller->id)
                        @else
                        value="{{ $seller->id }}" @endif>
            {{ $seller->name }}
        </option>
    @endforeach
</select>
</div>
@error('seller_id')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror