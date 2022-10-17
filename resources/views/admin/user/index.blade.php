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

    {{-- @include('admin.partials.flash_message')  --}}

    {{-- @if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif  --}}

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
                                        <th>Image <i class="ml-1 fa fa-id-card-o" aria-hidden="true"></i></th>
                                        <th>Name <i class="ml-1 fa fa-arrow-circle-left" aria-hidden="true"></i></th>
                                        <th>Surname <i class="ml-1 fa fa-arrow-circle-left" aria-hidden="true"></i></th>
                                        <th>Orders <i class="ml-1 fa fa-list-ul" aria-hidden="true"></i></th>
                                        <th>Actions <i class="ml-1 fa fa-list-alt" aria-hidden="true"></i></th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td class="align-middle">
                                                @if (!$user->img_path)
                                                    <img class="rounded border" src="{{ asset('storage/images/no_image.jpg') }}"
                                                        alt="no-image" width="80">
                                                @else
                                                    <img class="rounded border"
                                                        src="{{ asset('storage') . '/users_images/'. $user->img_name }}"
                                                        alt="{{ $user->name }}" width="80">
                                                @endif
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->surname }}</td>
                                            <td>{{ count($user->orders) ? count($user->orders) : "There's no orders"}}</td>
                                            <td>
                                                <a href="{{ route('admin.user.show', $user) }}"
                                                    class="text-decoration-none">
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
                                                <form action="{{ route('admin.user.destroy', $user) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="ml-1 fa fa-trash-o" aria-hidden="true"></i>
                                                    </button>
                                                </form>
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
