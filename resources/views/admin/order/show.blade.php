@extends('admin.layout')
@section('title')
Orders
@endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="mr-2 fa fa-list-alt"></i>Detail Order </h1>
    </div>
</div>
<div class="row">

    <div class="col-md-6">
        <div class="tile">
            <h3 class="tile-title"><i class="mx-1 fa fa-barcode" aria-hidden="true"></i> Order ID: {{ $order->id }}</h3>
            <div class="tile-body">
                <span class="d-block mb-3">
                    <strong><i class="mr-2 fa fa-exchange" aria-hidden="true"></i>Status: </strong> {{ $order->status }}
                </span>
                <span class="d-block">
                    <strong><i class="mr-2 fa fa-money" aria-hidden="true"></i>Total: </strong>{{ $order->total }} USD
                </span>

            </div>
            <div class="tile-footer"><a class="btn btn-primary" href="{{ route('admin.order.index') }}">Go Back</a>
            </div>
        </div>
        {{-- @include('admin.partials.flash_message') --}}
        {{-- @if (session('status'))
        {{-- <div class="alert alert-success">
            {{ session('status') }} --}}
        </div>
        <div class="col-md-6">
            <table class="table">
                <thead class="text-center">
                    <tr>
                        <th>Nome Prodotto</th>
                        <th>Prezzo</th>
                        <th>Stock</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($products as $product)
                    <tr>
                        <td class="align-middle">{{ $product->name }}</td>
                        <td class="align-middle">{{ $product->price }} €</td>
                        <td class="align-middle">{{ $product->stock }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('admin.products.show', $product->id) }}">
                                <button class="btn btn-sm btn-info mr-1"><i class="fa fa-eye"
                                        aria-hidden="true"></i></button>
                            </a>
                            <a href="{{ route('admin.seeReviews', $product) }}">
                                <button class="btn btn-sm btn-info mr-1"><i class="fa fa-star"
                                        aria-hidden="true"></i></button>
                            </a>
                            <a href="{{ route('admin.products.edit', $product->id) }}">
                                <button class="btn btn-sm btn-primary mr-1"><i class="fa fa-pencil-square-o"
                                        aria-hidden="true"></i></button>
                            </a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"
                                        aria-hidden="true"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td>Non ci sono prodotti</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
