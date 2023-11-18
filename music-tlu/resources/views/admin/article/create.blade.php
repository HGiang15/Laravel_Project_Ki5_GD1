@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Add Article')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Add new Article</h3>       
            </div>
            <div class="col-md-6">
                <a href="{{ route('articles.index') }}" class="btn btn-primary float-end">List Article</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    {{-- Tieude --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">Title</span>
                        <input type="text" name="title" class="form-control" placeholder="Enter title">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Tenbaihat --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">Name song</span>
                        <input type="text" name="nameSong" class="form-control" placeholder="Enter name song">
                        @error('nameSong')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- MaTheLoai --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="inputGroupSelect01">ID Category</label>
                        <select class="form-select me-5" id="inputGroupSelect01" name="idCategory">
                            <option value="" selected>Select</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->idCategory}}">
                                    {{$category->nameCategory}}
                                </option>
                            @endforeach
                        </select>
                        @error('idCategory')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Tomtat --}}
                    <div class="form-floating mt-4">
                        <textarea class="form-control" placeholder="Leave a description here" id="floatingTextarea2" style="height: 100px" name="summary"></textarea>
                        <label for="floatingTextarea2" class="text-secondary">Summary</label>
                        @error('summary')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    {{-- ND --}}
                    <div class="form-floating mt-4">
                        <textarea class="form-control" placeholder="Leave a description here" id="floatingTextarea2" style="height: 100px" name="content"></textarea>
                        <label for="floatingTextarea2" class="text-secondary">Content</label>
                        @error('content')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- MaTacgia --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="inputGroupSelect01">ID Author</label>
                        <select class="form-select me-5" id="inputGroupSelect01" name="idAuthor">
                            <option value="" selected>Select</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->idAuthor }}">{{ $author->nameAuthor }}</option>
                            @endforeach
                        </select>
                        @error('idAuthor')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Ngayviet --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">Date Write</span>
                        <input type="datetime-local" class="form-control me-5" aria-label="dateW" aria-describedby="addon-wrapping" name="dateW">
                        @error('dateW')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- img --}}
                    <div class="form-group mt-4">
                        <label for="">Imgage article</label>
                        <input type="file" name="imgArticle" class="form-control-file" >
                        @error('imgArticle')
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