@extends('admin.layout')
@section('content')
<form class="container" method="post" action="{{ route('admin.roles.store') }}">
    @csrf
   @include('admin.roles.form')
  </form>
  @endsection
