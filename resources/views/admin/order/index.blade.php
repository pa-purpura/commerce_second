@extends('admin.layout')
@section('title')
    Orders
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Pannello Orders</h1>
        </div>
    </div>

    {{-- @include('admin.partials.flash_message') --}}

    {{-- @if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif --}}

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title"><i class="fa fa-shopping-cart mr-2"></i> Orders List</h3>
                <div class="bs-component" style="margin-bottom: 15px;">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-center">
                                    <tr>
                                        <th>User<i class="ml-1 fa fa-user" aria-hidden="true"></i></th>
                                        <th>Order ID <i class="ml-1 fa fa-barcode" aria-hidden="true"></i></th>
                                        <th>Status <i class="ml-1 fa fa-exchange" aria-hidden="true"></i></th>
                                        <th>Total <i class="ml-1 fa fa-money" aria-hidden="true"></i></th>
                                        <th>Actions <i class="ml-1 fa fa-list-alt" aria-hidden="true"></i></th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($orders as $order)
                                        @component('components.modal',
                                            [
                                                'slot' => '',
                                                'id' => $order->id,
                                                'form_action' => route('admin.order.destroy', $order),
                                                'form_method' => 'DELETE',
                                                'title' => "Are you sure you want to delete $order->name?",
                                            ])
                                        @endcomponent
                                        <tr>
                                            <td>{{ $order->user->name }}</td>
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
                                                <button type="submit" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#exampleModal{{ $order->id }}">
                                                    <i class="ml-1 fa fa-trash-o" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
