@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="offset-md-3 col-md-5">
            @if ($message = Session::get('success'))
                <div class="alert alert-dismissible alert-success">
                    <button class="close" type="button" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @error('wishlist_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
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
                    <p><span class="font-weight-bold">Prezzo: </span> {{ $product->price }} €</p>
                    <p><span class="font-weight-bold">Stock: </span> {{ $product->stock }}</p>
                </div>
                <div>
                    @if ($wishlistOff->isNotEmpty())
                        <form action="{{ route('admin.addProductToWishlist') }}" class="mt-3" method="post">
                            @method('GET')
                            @csrf

                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <select name="wishlist_id" class="form-select" aria-label="Default select example">
                                <option value="">Select Wishlist</option>
                                @foreach ($wishlistOff as $wishlist)
                                    <option value="{{ $wishlist->id }}">{{ $wishlist->name }}
                                    </option>
                                @endforeach
                            </select>

                            <button class="btn btn-primary mt-3" type="subtmit">
                                Add product to Wishlist
                            </button>
                        </form>
                    @endif
                </div>
                <section class="container my-3">
                    <div class="row d-flex justify-content-center">
                        <ul class="list-group col-8">
                            @foreach ($wishlists as $wishlist)
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>{{ $wishlist->name }}</div>
                                    <div>
                                        <a
                                            href="{{ route('admin.detachWishlist', [$wishlist->id, $wishlist->pivot->product_id]) }}">
                                            <button class="btn btn-danger">
                                                Remove from wishlists
                                            </button>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
