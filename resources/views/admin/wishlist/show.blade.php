@extends('admin.layout')
@section('title')
    Wishlist
@endsection
@section('content')
    <div class="app-title">
        <h1><i class="fa fa-edit"></i> Profile: {{ $wishlist->name }} </h1>
    </div>
    <div class="row">
        <div class="col-2 mt-3">
            <div class="tile">
                <div class="tile-title">
                    <h3 class="title">{{ $wishlist->name }}</h3>
                    <h4>{{ $wishlist->user_id }}</h4>
                    {{-- <div class="btn-group"><a class="btn btn-primary" href="#"><i class="fa fa-lg fa-plus"></i></a><a class="btn btn-primary" href="#"><i class="fa fa-lg fa-edit"></i></a><a class="btn btn-primary" href="#"><i class="fa fa-lg fa-trash"></i></a></div> --}}
                </div>
            </div>
        </div>
        {{-- <div class="col-8">
            <div class="tile shadow">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th>Wishlist<i class="ml-1 fa fa-wishlist" aria-hidden="true"></i></th>
                                <th>Order ID <i class="ml-1 fa fa-barcode" aria-hidden="true"></i></th>
                                <th>Status <i class="ml-1 fa fa-exchange" aria-hidden="true"></i></th>
                                <th>Total <i class="ml-1 fa fa-money" aria-hidden="true"></i></th>
                                <th>Actions <i class="ml-1 fa fa-list-alt" aria-hidden="true"></i></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->wishlist->name }}</td>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>USD {{ $order->total }}</td>
                                    <td>
                                        <a href="{{ route('admin.order.show', $order) }}">
                                            <button class="btn btn-info">
                                                <i class="ml-1 fa fa-list-alt" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('admin.order.edit', $order->id) }}">
                                            <button class="btn btn-primary">
                                                <i class="ml-1 fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        <form action="{{ route('admin.order.destroy', $order) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="ml-1 fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
