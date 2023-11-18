@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Review')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Review <i class="fa-solid fa-book text-success mx-1"></i></h3>
            </div>
            <div class="col-md-6">
                <a href="{{ route('reviews.create') }}" class="btn btn-success float-end">Add new Review</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if (Session::has('information'))
            <div class="alert alert-success">
                {{ Session::get('information') }}
            </div>
        @elseif (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ReviewID</th>
                    <th>BookID</th>
                    <th>UserID</th>
                    <th>Rating</th>
                    <th>ReviewText</th>
                    <th>ReviewDate</th>
                    <th class="text-center">Detail</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $review)
                    <tr>
                        <td>{{ $review->ReviewID }}</td>
                        <td>{{ $review->BookID }}</td>
                        <td>{{ $review->UserID }}</td>
                        <td>{{ $review->Rating }}</td>
                        <td>{{ $review->ReviewText }}</td>
                        <td>{{ $review->ReviewDate }}</td>
                        <td class="text-center">
                            {{-- {{ route('reviews.show', $review->ReviewID) }} --}}
                            <a href="" class="btn btn-secondary">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            {{-- {{ route('reviews.edit', $review->ReviewID) }} --}}
                            <a href="{{ route('reviews.edit', $review->ReviewID) }}" class="btn btn-info">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-danger" href="" data-bs-toggle="modal" data-bs-target="#modal{{ $review->ReviewID }}">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                        <!-- Modal -->
                        <div class="modal fade" id="modal{{ $review->ReviewID }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE REVIEW</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Do you want to delete this review with id  {{ $review->ReviewID  }} ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <form action="{{ route('reviews.destroy', $review->ReviewID ) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary">Yes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination custom-pagination justify-content-center">
            {{ $reviews->links() }}
        </div>
    </div>
</div>

@endsection