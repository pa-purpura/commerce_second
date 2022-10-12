@extends('admin.layout')
@section('content')
<form class="container" method="post" action="{{ route('admin.sellers.store') }}">
    @csrf
   @include('admin.sellers.form')
  </form>
  @endsection
