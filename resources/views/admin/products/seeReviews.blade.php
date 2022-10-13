@extends('admin.layout')
@section('content')

<div class="card-body">
    <div class="col-md-12">
        @include('admin.partials.flash_message')
        <div class="tile">
            <div class="d-flex justify-content-between">
                <h3 class="tile-title">Review Table</h3>
                <a href="{{ route('admin.reviews.create') }}"><button class="btn btn-success mb-2"><i class="fa fa-plus"
                            aria-hidden="true"></i>
                        Aggiungi nuova Review </button></a>
            </div>
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
                    'id' => $review->id,
                    'form_action' => route('admin.reviews.destroy', $review),
                    'form_method' => 'DELETE',
                    'title' => 'Are you sure you want to delete this review?',
                    ])
                    @endcomponent
                    <tr>
                        <td>{{ $review->rating }}</td>
                        <td>{{ $review->description }}</td>
                        <td>
                            <div class="d-flex">
                                <button class="btn btn-danger mr-2"><i class="fa fa-trash-o" aria-hidden="true"
                                        data-toggle="modal" data-target="#exampleModal{{ $review->id }}"></i>
                                </button>
                                <a href="{{ route('admin.reviews.edit', $review->id) }}" class="btn btn-primary"><i
                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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
