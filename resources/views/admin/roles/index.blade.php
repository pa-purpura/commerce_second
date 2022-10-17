@extends('admin.layout')
@section('content')
    <h3>Roles</h3>
    @include('admin.partials.flash_message')

    <a href="{{ route('admin.roles.create') }}">create</a>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th>Name</th>
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
                <td>{{ $role->address }}</td>
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
@endsection
