@extends('admin.layout')
@section('content')
<form class="container" method="post" action="{{ route('admin.permissions.update', $permission->id) }}">
    <h2>Edit Permission</h2>
    @csrf
    @method('PATCH')
    @include('admin.permissions.form')
</form>
@endsection
