@extends('admin.layout')
@section('title')
    Wishlists
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Pannello Wishlist</h1>
        </div>
    </div>

    {{-- @include('admin.partials.flash_message')  --}}

    {{-- @if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif  --}}

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title"><i class="fa fa-wishlists mr-2"></i> Wishlists List</h3>
                <div class="text-right mb-3 mr-3">
                    <a href="{{ route('admin.wishlist.create') }}">
                        <button class="btn btn-sm btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Add
                            wishlist
                        </button>
                    </a>
                </div>
                <div class="bs-component" style="margin-bottom: 15px;">
                    <div class="col-md-12">
                        @include('admin.partials.flash_message')
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-center">
                                    <tr>
                                        <th>Wishlist ID <i class="ml-1 fa fa-barcode" aria-hidden="true"></i></th>
                                        <th>Name <i class="ml-1 fa fa-arrow-circle-left" aria-hidden="true"></i></th>
                                        <th>User ID <i class="ml-1 fa fa-barcode" aria-hidden="true"></i></th>
                                        <th>Actions <i class="ml-1 fa fa-list-alt" aria-hidden="true"></i></th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($wishlists as $wishlist)
                                        @component('components.modal',
                                            [
                                                'slot' => '',
                                                'id' => $wishlist->id,
                                                'form_action' => route('admin.wishlist.destroy', $wishlist),
                                                'form_method' => 'DELETE',
                                                'title' => "Are you sure you want to delete $wishlist->name?",
                                            ])
                                        @endcomponent
                                        <tr>
                                            <td>{{ $wishlist->id }}</td>
                                            <td>{{ $wishlist->name }}</td>
                                            <td>{{ $wishlist->user_id }}</td>
                                            <td>
                                                <a href="{{ route('admin.wishlist.show', $wishlist) }}"
                                                    class="text-decoration-none">
                                                    <button class="btn btn-info">
                                                        <i class="ml-1 fa fa-list-alt" aria-hidden="true"></i>
                                                    </button>
                                                </a>
                                                <a href="{{ route('admin.wishlist.edit', $wishlist->id) }}"
                                                    class="text-decoration-none">
                                                    <button class="btn btn-primary">
                                                        <i class="ml-1 fa fa-pencil-square-o"></i>
                                                    </button>
                                                </a>
                                                <button type="submit" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#exampleModal{{ $wishlist->id }}">
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
