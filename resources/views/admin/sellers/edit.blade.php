@extends('admin.layout')
@section('content')
<form class="container" method="post" action="{{ route('admin.sellers.update', $seller->id) }}">
    <h2>Edit Profile</h2>
    @csrf
    @method('PATCH')
    @include('admin.sellers.form')
</form>
@endsection
