@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Edit Books')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Edit Book</h3>       
            </div>
            <div class="col-md-6">
                <a href="{{ route('books.index') }}" class="btn btn-primary float-end">Book List</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('books.update', $book->BookID) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    {{-- BookID --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">BookID</label>
                        <input type="text" name="BookID" class="form-control bg-warning" value="{{ $book->BookID }}" readonly>
                    </div>
                    {{-- Author --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">Author</label>
                        <input type="text" name="Author" class="form-control" value="{{ $book->Author }}">
                        @error('Author')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Title --}}
                    <div class="form-floating mt-4">
                        <textarea class="form-control"  id="floatingTextarea2" style="height: 100px" name="Title">{{ $book->Title }}</textarea>
                        <label for="floatingTextarea2" class="text-secondary">Title</label>
                        @error('Title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Genre --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">Genre</label>
                        <input type="text" name="Genre" class="form-control" value="{{ $book->Genre }}">
                        @error('Genre')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    {{-- PublicationYear --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">PublicationYear</label>
                        <input type="text" name="PublicationYear" class="form-control" value="{{ $book->PublicationYear }}">
                        @error('PublicationYear')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- ISBN --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">ISBN</label>
                        <input type="text" name="ISBN" class="form-control" value="{{ $book->ISBN }}">
                        @error('ISBN')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- ConvertImageURL --}}
                    <div class="form-group mt-5">
                        <label class="input-group-text" for="">ConvertImageURL</label>
                        <input type="file" name="ConvertImageURL" class="form-control-file" value="{{ $book->ConvertImageURL }}">
                        @if ($book->ConvertImageURL)
                            <img src="{{ asset( $book->ConvertImageURL ) }}" alt="img flower" style="max-width: 200px; margin-top: 10px;">
                        @endif
                        @error('ConvertImageURL')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-4">Update</button>
        </form>
    </div>
</div>
@endsection