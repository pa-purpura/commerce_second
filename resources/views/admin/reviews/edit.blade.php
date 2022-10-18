@extends('admin.layout')
@section('content')
<form class="container" method="post" action="{{ route('admin.reviews.update', $review->id) }}">
    <h2>Edit Review</h2>
    @csrf
    @method('PATCH')
    @include('admin.reviews.form')
</form>
@endsection
