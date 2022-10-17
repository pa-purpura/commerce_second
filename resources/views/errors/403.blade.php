{{-- @extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden')) --}}
@extends('admin.layout')
@section('content')
<div class="page-error tile">
    <h1><i class="fa fa-exclamation-circle"></i> Error 403: You are not authorized</h1>
    {{-- <p>The page you have requested is not found.</p> --}}
    <p><a class="btn btn-primary" href="javascript:window.history.back();">Go Back</a></p>
  </div>
@endsection
