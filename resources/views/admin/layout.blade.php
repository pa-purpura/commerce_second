<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/font-awesome/4.7.0/css/font-awesome.min.css') }}" /> -->
    
    <!-- INTERNAL WYSIWYG Editor css -->
		<link href="{{asset('admin/plugins/wysiwyag/richtext.css')}}" rel="stylesheet" />
    <!-- INTERNAL Quill css -->
		<link href="{{asset('admin/plugins/quill/quill.snow.css')}}" rel="stylesheet">
		<link href="{{asset('admin/plugins/quill/quill.bubble.css')}}" rel="stylesheet">
</head>

<body class="app sidebar-mini rtl">
    @include('admin.partials.header')
    @include('admin.partials.sidebar')    
    <main class="app-content">
        @yield('content')
    </main>

    <!-- generic script js -->
    <script src="{{ asset('admin/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/main.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/pace.min.js') }}"></script>
    <!-- INTERNAL quill js -->
		<script src="{{asset('admin/plugins/quill/quill.min.js')}}"></script>
		<script src="{{asset('admin/js/form-editor2.js')}}"></script>
    <!-- INTERNAL WYSIWYG Editor js -->
    <script src="{{asset('admin/plugins/wysiwyag/jquery.richtext.js')}}"></script>
    <script src="{{asset('admin/js/form-editor.js')}}"></script>
</body>

</html>