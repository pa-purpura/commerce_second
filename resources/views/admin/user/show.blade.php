@extends('admin.layout')
@section('title') User @endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-edit"></i> Profilo: {{$user->name}} </h1>

    </div>
</div>

@endsection