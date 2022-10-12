@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="offset-md-3 col-md-5">
            <div class="tile">
                <h3 class="tile-title">Modifica Prodotto</h3>
                <div class="tile-body">
                    <form class="form-horizontal" action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('admin.products.form')

                        <div class="tile-footer">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-3">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="fa fa-fw fa-lg fa-check-circle"></i>Modifica</button>&nbsp;&nbsp;&nbsp;<a
                                        class="btn btn-info" href="{{ route('admin.products.index') }}"><i
                                            class="fa fa-arrow-left" aria-hidden="true"></i>Torna ai prodotti</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
