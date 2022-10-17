@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="offset-md-3 col-md-5">
            <div class="tile">
                <div class="tile-title-w-btn">
                    <h3 class="title"><span class="text-muted">Prodotto: </span> {{ $product->name }}</h3>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.products.index') }}"><i class="fa fa-arrow-left"
                            aria-hidden="true"></i> Torna ai prodotti</a>
                </div>
                <hr>
                @if (!$product->img_path)
                    <img class="rounded w-100 border" src="{{ asset('storage/images/no_image.jpg') }}" alt="image" width="no-image">
                @else
                    <img class="rounded w-100 border" src="{{  asset('storage') . '/products_images/' . $product->img_name }}" alt="{{ $product->name }}"
                        width="">
                @endif
                <div class="tile-body my-3">
                    <p>{{ $product->description }}</p>
                    <hr>
                    <p><span class="font-weight-bold">Prezzo: </span>  {{ $product->price }} €</p>
                    <p><span class="font-weight-bold">Stock: </span>  {{ $product->stock }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
