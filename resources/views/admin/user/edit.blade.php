@extends('admin.layout')
@section('title') Edit user @endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-edit"></i></i> Modifica User</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="tile">
            <h3 class="tile-title">Vertical da cambiare Form</h3>
            {{-- {{ route('admin.post.update', $post->id)} --}}
            <form action="}" method="post">
                @method('PUT')
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