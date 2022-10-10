@extends('admin.layout')

@section('content')
<div class="row">
    <div class="offset-md-3 col-md-5">
        <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">{{ $product->name }}</h3>
            </div>
            <img src="" alt="img">
            <div class="tile-body">
              <p>{{ $product->description }}</p>
              <p>Prezzo: {{ $product->price }} €</p>
              <p>Stock: {{ $product->stock }}</p>
            </div>
          </div>
    </div>
</div>
@endsection