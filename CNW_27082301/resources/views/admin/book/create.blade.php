@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Add Books')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Add new Book</h3>       
            </div>
            <div class="col-md-6">
                <a href="{{ route('books.index') }}" class="btn btn-primary float-end">Book List</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    {{-- Author --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">Author</label>
                        <input type="text" name="Author" class="form-control" placeholder="Enter Author">
                        @error('Author')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Title --}}
                    <div class="form-floating mt-4">
                        <textarea class="form-control" placeholder="Leave a description here" id="floatingTextarea2" style="height: 100px" name="Title"></textarea>
                        <label for="floatingTextarea2" class="text-secondary">Title</label>
                        @error('Title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Genre --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">Genre</label>
                        <input type="text" name="Genre" class="form-control" placeholder="Enter Genre">
                        @error('Genre')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    {{-- PublicationYear --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">PublicationYear</label>
                        <input type="text" name="PublicationYear" class="form-control" placeholder="Enter PublicationYear">
                        @error('PublicationYear')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- ISBN --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">ISBN</label>
                        <input type="text" name="ISBN" class="form-control" placeholder="Enter ISBN">
                        @error('ISBN')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- ConvertImageURL --}}
                    <div class="form-group mt-5">
                        <label class="input-group-text" for="">ConvertImageURL</label>
                        <input type="file" name="ConvertImageURL" class="form-control-file" >
                        @error('ConvertImageURL')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-4">Save</button>
        </form>
    </div>
</div>
@endsection