@extends('admin.layout')
@section('title')
Users
@endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Pannello User</h1>
    </div>
</div>

@include('admin.partials.flash_message')

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title"><i class="fa fa-users mr-2"></i> Users List</h3>
            <div class="text-right mb-3 mr-3">
                <a href="{{ route('admin.user.create') }}">
                    <button class="btn btn-sm btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Add User</button>
                </a>
            </div>
            <div class="bs-component" style="margin-bottom: 15px;">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th>User ID <i class="ml-1 fa fa-id-card-o" aria-hidden="true"></i></th>
                                    <th>Name <i class="ml-1 fa fa-arrow-circle-left" aria-hidden="true"></i></th>
                                    <th>Surname <i class="ml-1 fa fa-arrow-circle-left" aria-hidden="true"></i></th>
                                    <th>Orders <i class="ml-1 fa fa-list-ul" aria-hidden="true"></i></th>
                                    <th>Actions <i class="ml-1 fa fa-list-alt" aria-hidden="true"></i></th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($users as $user)
                                @component('components.modal',
                                [
                                'slot' => '',
                                'id' => $user->id,
                                'form_action' => route('admin.user.destroy', $user),
                                'form_method' => 'DELETE',
                                'title' => 'Are you sure you want to delete this user?',
                                ])
                                @endcomponent
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->surname }}</td>
                                    <td>{{ count($user->orders) ? count($user->orders) : "There's no orders"}}</td>
                                    <td>
                                        <a href="{{ route('admin.user.show', $user) }}" class="text-decoration-none">
                                            <button class="btn btn-info">
                                                <i class="ml-1 fa fa-list-alt" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('admin.user.edit', $user->id) }}"
                                            class="text-decoration-none">
                                            <button class="btn btn-primary">
                                                <i class="ml-1 fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        <button class="btn btn-danger mr-2"><i class="fa fa-trash-o" aria-hidden="true"
                                                data-toggle="modal" data-target="#exampleModal{{ $user->id }}"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endsection
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
