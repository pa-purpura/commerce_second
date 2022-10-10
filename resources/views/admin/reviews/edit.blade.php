@extends('admin.layout')
@section('content')
<form class="container" method="post" action="{{ route('admin.reviews.update', $review->id) }}">
    <h2>Edit Profile</h2>
    @csrf
    @method('PATCH')
    @include('admin.reviews.form')
</form>
@endsection
