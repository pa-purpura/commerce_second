@extends('admin.layout')
@section('content')
{{-- {{ Auth::user()->name }} --}}
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>Reviews</h1>
            <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active"><a href="#">Table</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('admin.partials.flash_message')
            <div class="tile">

                <h3 class="tile-title">review Table</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Rating</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reviews as $review)
                        @component('components.modal',
                        [
                            'slot' => '',
                            'id' =>  $review->id,
                            'form_action' =>  route('admin.reviews.destroy', $review),
                            'form_method' => 'DELETE',
                            'title' => 'Are you sure you want to delete this review?',
                        ])
                        @endcomponent
                            <tr>
                                <td>{{ $review->rating }}</td>
                                <td>{{ $review->description }}</td>
                                <td>
                                    <div class="d-flex">
                                        {{-- <form action="{{ route('admin.reviews.destroy', $review) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash-o"
                                                    aria-hidden="true"></i>
                                            </button>
                                        </form> --}}
                                        <button class="button btn btn-outline-danger"><i class="fa fa-trash-o"
                                            aria-hidden="true" data-toggle="modal"
                                            data-target="#exampleModal{{ $review->id }}"></i>
                                    </button>
                                        <a href="{{ route('admin.reviews.edit', $review->id) }}"
                                            class="ms-2 btn btn-outline-primary"><i class="fa fa-pencil-square-o"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <span>reviews Empty!</span>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
