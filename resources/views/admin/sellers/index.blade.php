@extends('admin.layout')
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-th-list"></i>Sellers</h1>
        <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active"><a href="#">Table</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        @include('admin.partials.flash_message')
        <div class="tile">
            <div class="d-flex justify-content-between">
                <h3 class="tile-title">Seller Table</h3>
                <a href="{{ route('admin.sellers.create') }}"><button class="btn btn-success mb-2"><i
                            class="fa fa-plus" aria-hidden="true"></i>
                        Aggiungi nuovo Seller </button></a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sellers as $seller)
                    @component('components.modal',
                    [
                    'slot' => '',
                    'id' => $seller->id,
                    'form_action' => route('admin.sellers.destroy', $seller),
                    'form_method' => 'DELETE',
                    'title' => 'Are you sure you want to delete this seller?',
                    ])
                    @endcomponent
                    <tr>
                        <td>{{ $seller->name }}</td>
                        <td>{{ $seller->address }}</td>
                        <td>
                            <div class="d-flex">
                                <button class="btn btn-danger mr-2"><i class="fa fa-trash-o" aria-hidden="true"
                                        data-toggle="modal" data-target="#exampleModal{{ $seller->id }}"></i>
                                </button>
                                <a href="{{ route('admin.sellers.edit', $seller->id) }}" class="btn btn-primary"><i
                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <span>sellers Empty!</span>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
