@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Add Author')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Add new Author</h3>       
            </div>
            <div class="col-md-6">
                <a href="{{ route('authors.index') }}" class="btn btn-primary float-end">List Author</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('authors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    {{-- HoTen --}}
                    <div class="form-group">
                        <label for="">Name Author</label>
                        <input type="text" name="nameAuthor" class="form-control" placeholder="Enter name author">
                        @error('nameAuthor')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- img --}}
                    <div class="form-group mt-4">
                        <label for="">Image author</label>
                        <input type="file" name="imgAuthor" class="form-control-file" >
                        @error('imgAuthor')
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