@extends('admin.layout')
@section('title')
    Orders
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="mr-2 fa fa-pencil-square-o"></i>Edit Order </h1>
        </div>
    </div>
    <div class="col-md-10">
        {{-- <div class="tile">
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
        </div> --}}
        <div class="tile-body ">
            <form class="form-horizontal" method="POST" action="{{ route('admin.order.update', $order) }}"
                enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="tile-body">
                    <div class="mb-3">
                        <h1><i class="mr-2 fa fa-barcode" aria-hidden="true"></i>Order ID: {{ $order->id }}</h1>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label"><strong>Status</strong></label>

                        <input type="text" class="form-control" name="status"
                            value="{{ old('status', isset($order) ? $order->status : '') }}">

                        @error('status')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="total" class="form-label"><strong>Total</strong></label>

                        <input type="number" class="form-control" name="total"
                            value="{{ old('total', isset($order) ? $order->total : '') }}">

                        @error('total')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-8">
                        <button class="btn btn-primary mr-3" type="submit">
                            <i class="fa fa-fw fa-lg fa-check-circle"></i>
                            Register
                        </button>
                        <a class="btn btn-secondary" href="{{ route('admin.order.index') }}"><i
                                class="fa fa-fw fa-lg fa-times-circle"></i>
                            Go Back
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- @include('admin.partials.flash_message')  --}}

    {{-- @if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif  --}}
@endsection
