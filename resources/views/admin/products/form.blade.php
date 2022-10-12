<div class="form-group row">
    <label class="control-label col-md-3">Nome prodotto</label>
    <div class="col-md-8">
      <input class="form-control" name="name" value="{{ old('name', isset($product) ? $product->name : '') }}" type="text" placeholder="Inserisci nome del prodotto">
    </div>
  </div>
  <div class="form-group row">
    <label class="control-label col-md-3">Descrizione</label>
    <div class="col-md-8">
      <textarea class="form-control" name="description" rows="4" placeholder="Inserisci descrizione">{{ old('description', isset($product) ? $product->description : '') }}</textarea>
    </div>
  </div>
  <div class="form-group row">
    <label class="control-label col-md-3">Prezzo</label>
    <div class="col-md-8">
      <input type="number" name="price" min="1" step="any" value="{{ old('price', isset($product) ? $product->price : '') }}" class="form-control" placeholder="Inserisci prezzo">
    </div>
  </div>
  <div class="form-group row">
    <label class="control-label col-md-3">Stock</label>
    <div class="col-md-8">
      <input type="number"  name="stock" value="{{ old('stock', isset($product) ? $product->stock : '') }}" class="form-control" placeholder="Inserisci stock">
    </div>
  </div>
 
  <div class="form-group row">
    <label class="control-label col-md-3">Immagine prodotto</label>
    <div class="col-md-8">
      <input class="form-control" type="file"  name="image">
    </div>
  </div>