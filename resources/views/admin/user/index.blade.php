@extends('admin.layout')
@section('title') Users @endsection
@section('content')

<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Pannello User</h1>
    </div>
</div>

{{-- @include('admin.partials.flash_message')  --}}

{{-- @if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif  --}}

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Lista</h3>
            <div class="bs-component" style="margin-bottom: 15px;">
                {{-- <div class="btn-group" role="group" aria-label="Basic example">
                    @foreach ($roles as $role)
                    <a href="{{route('getByRole', $role->id)}}">
                        <button class="btn btn-secondary" type="button">{{$role->name}}</button>
                    </a>
                    @endforeach
                    <a href="{{route('admin.user.index')}}">
                        <button class="btn btn-secondary" type="button">tutti</button>
                    </a>
                </div> --}}
            </div>
            <a href="{{route('admin.user.create')}}"> <button class="btn btn-primary my-3" type="button">Crea Nuovo</button></a>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>foto</th>
                            <th>nome</th>
                            <th>email</th>
                            <th>aggiornato il</th>
                            <th colspan="2">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                                @if (!$user->avatar_path )
                                    <img src="{{ asset('storage/images/no_photo.png') }}" alt="p" width="40" height="40">  
                                @else
                                    <img src="{{ asset('storage')."/". $user->avatar_name }}" alt="p" width="40" height="40">
                                @endif
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td><a href="{{route('admin.user.edit', $user)}}"><button class="btn btn-secondary" type="button">Modifica</button></a></td>
                            <td>
                                <form method="user" action="{{route('admin.user.destroy', $user)}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger ">Cancella</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection