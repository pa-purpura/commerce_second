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
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Edit User</h3>

                <form class="form-horizontal" action="{{ route('admin.user.update', $user) }}" method="post"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    @include('admin.user.form')

                    <div class="tile-footer mb-2">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-fw fa-lg fa-check-circle"></i>
                            Register
                        </button>&nbsp;&nbsp;&nbsp;
                    </div>
                </form>
                <a href="{{ route('admin.user.index') }}" class="text-decoration-none">
                    <button class="btn btn-info">
                        <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                        Back
                    </button>&nbsp;&nbsp;&nbsp;
                </a>
            </div>
        </div>
    </div>
@endsection
