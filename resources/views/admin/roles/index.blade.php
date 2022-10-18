

@extends('admin.layout')
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-th-list"></i>Roles</h1>
        <p></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        @include('admin.partials.flash_message')
        <div class="tile">
            <div class="d-flex justify-content-between">
                <h3 class="tile-title">Role Table</h3>
                <a href="{{ route('admin.roles.create') }}"><button class="btn btn-success mb-2"><i
                            class="fa fa-plus" aria-hidden="true"></i>
                        Aggiungi nuovo ruolo </button></a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                    @component('components.modal',
                    [
                    'slot' => '',
                    'id' => $role->id,
                    'form_action' => route('admin.roles.destroy', $role),
                    'form_method' => 'DELETE',
                    'title' => 'Are you sure you want to delete this role?',
                    ])
                    @endcomponent
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>
                            <div class="d-flex">
                                <button class="btn btn-danger mr-2"><i class="fa fa-trash-o" aria-hidden="true"
                                        data-toggle="modal" data-target="#exampleModal{{ $role->id }}"></i>
                                </button>
                                <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-primary"><i
                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <span>roles Empty!</span>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
