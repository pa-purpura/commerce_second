@extends('admin.layout')
@section('title')
    New User
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i></i> Create New User</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title"><i class="fa fa-user-plus mr-1" aria-hidden="true"></i>
                    Add User</h3>
                <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
                    @method('post')
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
@endsection
