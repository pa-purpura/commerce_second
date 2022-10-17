@extends('admin.layout')
@section('title')
    Edit user
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i></i> Modifica User</h1>
        </div>
    </div>
</div>
@include('admin.partials.flash_message')
<div class="row">

    <div class="col-md-3">
        <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
                <li class="nav-item"><a class="nav-link active" href="#user-edit" data-toggle="tab">Edit Profile</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#edit-role" data-toggle="tab">Edit Roles</a></li>
                <li class="nav-item"><a class="nav-link" href="#edit-permissions" data-toggle="tab">Edit Permissions</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-9">
        <div class="tab-content">
            <div class="tab-pane active" id="user-edit">
                <div class="row">
                    <div class="col-md-9">
                        <div class="tile">
                            <h3 class="tile-title">Edit User</h3>

                            <form class="form-horizontal" action="{{ route('admin.user.update', $user) }}" method="post"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                @include('admin.user.form')

                                <div class="tile-footer">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-fw fa-lg fa-check-circle"></i>
                                        Register
                                    </button>&nbsp;&nbsp;&nbsp;
                                    <a href="{{ route('admin.user.index') }}" class="text-decoration-none">
                                        <button class="btn btn-info">
                                            <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                                            Back
                                        </button>&nbsp;&nbsp;&nbsp;
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="edit-role">
                <div class="tile">
                    <div class="row">
                        <form action="{{ route('admin.assignRole', $user->id) }}">
                            <div class="form-group col-md-6">
                                <div>
                                    <label for="roles">Add Roles:</label>
                                </div>
                                <select name="roles[]" id="" multiple>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"
                                        @if(Request::url()==='http://127.0.0.1:8000/admin/user/create' ) @elseif($user->
                                        hasRole($role->id))
                                        selected="selected"
                                        @endif
                                        >{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        <div class="col-md-6">
                            @if ($user_role->isNotEmpty())

                            <form action="{{ route('admin.deleteAllRoles', $user->id) }}">
                                <button class="btn btn-danger mb-2">Delete All</button>
                            </form>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user_role as $role)
                                    <tr>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->address }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <form action="{{ route('admin.deleteRole', [$user->id, $role]) }}">
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </form>
                                                <a href="{{ route('admin.roles.edit', $role->id) }}"
                                                    class="btn btn-primary ms-2"><i class="fa fa-pencil-square-o"
                                                        aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <span class="text-danger">Questo utente non ha ruoli</span>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade" id="edit-permissions">
                <div class="tile">
                    <div class="row">
                        <form action="{{ route('admin.assignPermission', $user->id) }}">
                            <div class="form-group col-md-6">
                                <div>
                                    <label for="roles">Add Permissions:</label>
                                </div>
                                <select name="permissions[]" id="" multiple>
                                    @foreach ($permissions as $permission)
                                    <option value="{{ $permission->id }}"
                                        @if(Request::url()==='http://127.0.0.1:8000/admin/user/create' ) @elseif($user->
                                        hasPermissionTo($permission->id))
                                        selected="selected"
                                        @endif
                                        >{{ $permission->name }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>

                    <div class="col-md-6">
                        @if ($user_permissions->isNotEmpty())
                        <form action="{{ route('admin.deleteAllPermissions', $user->id) }}">
                            <button class="btn btn-danger mb-2">Delete All</button>
                        </form>
                        <table class="table table-striped table-dark">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user_permissions as $permission)
                                <tr>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->address }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <form
                                                action="{{ route('admin.deletePermission', [$user->id, $permission]) }}">
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"
                                                        aria-hidden="true"></i></button>
                                            </form>
                                            <a href="{{ route('admin.permissions.edit', $permission->id) }}"
                                                class="btn btn-primary ms-2"><i class="fa fa-pencil-square-o"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <span class="text-danger">Questo utente non ha permessi!</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
