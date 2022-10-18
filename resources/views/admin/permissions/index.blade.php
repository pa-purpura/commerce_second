

@extends('admin.layout')
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-th-list"></i>Permissions</h1>
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
                <h3 class="tile-title">Permission Table</h3>
                <a href="{{ route('admin.permissions.create') }}"><button class="btn btn-success mb-2"><i
                            class="fa fa-plus" aria-hidden="true"></i>
                        Aggiungi nuovo permesso </button></a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($permissions as $permission)
                    @component('components.modal',
                    [
                    'slot' => '',
                    'id' => $permission->id,
                    'form_action' => route('admin.permissions.destroy', $permission),
                    'form_method' => 'DELETE',
                    'title' => 'Are you sure you want to delete this permission?',
                    ])
                    @endcomponent
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <div class="d-flex">
                                <button class="btn btn-danger mr-2"><i class="fa fa-trash-o" aria-hidden="true"
                                        data-toggle="modal" data-target="#exampleModal{{ $permission->id }}"></i>
                                </button>
                                <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-primary"><i
                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <span>permissions Empty!</span>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
