@extends('admin.layout')
@section('content')
<form class="container" method="post" action="{{ route('admin.roles.update', $role->id) }}">
    <h2>Edit Role</h2>
    @csrf
    @method('PATCH')
    @include('admin.roles.form')
</form>
@endsection
