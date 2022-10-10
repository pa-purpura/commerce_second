@extends('admin.layout')
@section('title') new users @endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-edit"></i></i> Crea Nuovo User</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="tile">
            <h3 class="tile-title">Vertical da cambiare orm</h3>
            <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
                @method('post')
                @csrf
                
                {{-- @include('admin.post.form') --}}
                <div>qui andra il form</div>
                {{-- @include('admin.player.prova') --}}
                <div class="tile-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;
                    <!-- <a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a> -->
                </div>
            </form>
        </div>
    </div>
</div>
@endsection