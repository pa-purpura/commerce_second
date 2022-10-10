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
    <div class="col-md-2">
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
            <div class="tile-footer"><a class="btn btn-primary" href="{{ route('admin.order.index') }}">Go Back</a></div>
        </div>
        {{-- @include('admin.partials.flash_message')  --}}
        {{-- @if (session('status'))
        {{-- <div class="alert alert-success">
        {{ session('status') }} --}}
    </div>
@endsection
