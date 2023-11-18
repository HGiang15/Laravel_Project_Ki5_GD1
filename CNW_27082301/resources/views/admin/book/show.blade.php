@extends('layouts.base')

@section('title', 'Detail Book')

@section('header')
    @include('layouts.header')
@section('main')
<div class="container p-5 shadow">
    <div class="row">    
        <div class="col-md-4">
            <img src="{{ asset( $book->ConvertImageURL ) }}" alt="" style="height: 20rem; width: 20rem; border-radius: 20px;">
        </div>
        <div class="col-md-5">
            <h2 class="text-success">Flower Information</h2>
            <p><span class="fw-bold">Book ID: </span>{{ $book->BookID }}</p>
            <p><span class="fw-bold">Author's name: </span>{{ $book->Author }}</p>
            <p><span class="fw-bold">Title: </span>{{ $book->Title }}</p>
            <p><span class="fw-bold">Genre: </span>{{ $book->Genre }}</p>
            <p><span class="fw-bold">Publication Year: </span>{{$book->PublicationYear}}</p>
            <p><span class="fw-bold">ISBN: </span>{{$book->ISBN}}</p>
        </div>
        <div class="col-md-3">
            <a href="{{ route('books.edit', $book->BookID ) }}" class="btn btn-info">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <a class="btn btn-danger" href="" data-bs-toggle="modal" data-bs-target="#modal{{ $book->BookID }}">
                <i class="fa-solid fa-trash"></i>
            </a>
            <!-- Modal -->
            <div class="modal fade" id="modal{{ $book->BookID }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE BOOK</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Do you want to delete this book with id  {{ $book->BookID  }} ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="{{ route('books.destroy', $book->BookID ) }} " method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('books.index') }}">
                <button type="button" class="btn btn-warning px-4 m-0">Return</button>
            </a>
        </div>
    </div>
</div>
@endsection