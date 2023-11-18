@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Book')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Book <i class="fa-solid fa-book text-success mx-1"></i></h3>
            </div>
            <div class="col-md-6">
                <a href="{{ route('books.create') }}" class="btn btn-success float-end">Add new Book</a>
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
                    <th>BookID</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>PublicationYear</th>
                    <th>ISBN</th>
                    <th class="text-center">ConvertImageURL</th>
                    <th class="text-center">Detail</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->BookID }}</td>
                        <td>{{ $book->Author }}</td>
                        <td>{{ $book->Title }}</td>
                        <td>{{ $book->Genre }}</td>
                        <td>{{ $book->PublicationYear }}</td>
                        <td>{{ $book->ISBN }}</td>
                        <td class="text-center"><img width="250" height="250" src="{{ asset( $book->ConvertImageURL ) }}" alt=""></td>
                        <td class="text-center">
                            <a href="{{ route('books.show', $book->BookID) }}" class="btn btn-secondary">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('books.edit', $book->BookID) }}" class="btn btn-info">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-danger" href="" data-bs-toggle="modal" data-bs-target="#modal{{ $book->BookID }}">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
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
                                        <form action="{{ route('books.destroy', $book->BookID ) }}" method="POST">
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
            {{ $books->links() }}
        </div>
    </div>
</div>

@endsection