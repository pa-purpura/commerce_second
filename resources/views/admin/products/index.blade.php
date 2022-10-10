@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">

                @if ($message = Session::get('success'))
                    <div class="alert alert-dismissible alert-success">
                        <button class="close" type="button" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                <div class="tile">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="tile-title">Lista Prodotti</h3>
                        <a href="{{ route('admin.products.create') }}">
                            <button class="btn btn-sm btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Aggiungi nuovo
                                prodotto</button>
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Immagine</th>
                                    <th>Nome Prodotto</th>
                                    <th>Descrizione</th>
                                    <th>Prezzo</th>
                                    <th>Stock</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td><img src="" alt="img"></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ Str::limit($product->description, 60) }}</td>
                                        <td>{{ $product->price }} €</td>
                                        <td>{{ $product->stock }}</td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="{{ route('admin.products.show', $product->id) }}">
                                                <button class="btn btn-sm btn-info"><i class="fa fa-eye"
                                                        aria-hidden="true"></i></button>
                                            </a>
                                            <a href="{{ route('admin.products.edit', $product->id) }}">
                                                <button class="btn btn-sm btn-primary mx-2"><i class="fa fa-pencil-square-o"
                                                        aria-hidden="true"></i></button>
                                            </a>
                                            <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                method="POST">
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
            @endsection