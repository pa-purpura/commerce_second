@extends('admin.layout')
@section('content')
    <form class="container" method="post" action="{{ route('admin.reviews.store') }}">
        @csrf
        @include('admin.reviews.form')
    </form>
@endsection
