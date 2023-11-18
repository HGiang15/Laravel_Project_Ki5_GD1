@extends('layouts.base')

{{-- Triển khai title --}}
@section('title', 'Edit Category')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Edit Category</h3>
            </div>
            <div class="col-md-6">
                <a href="{{ route('categories.index') }}" class="btn btn-primary float-end">List Category</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('categories.update', $category->idCategory) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    {{-- MTL --}}
                    <div class="form-group">
                        <label for="">ID</label>
                        <input type="text" name="idCategory" class="form-control bg-warning" value="{{ $category->idCategory }}" readonly>
                    </div>
                    {{-- TenTL --}}
                    <div class="form-group">
                        <label for="">Name catgegory</label>
                        <input type="text" name="nameCategory" class="form-control" value="{{$category->nameCategory}}">
                    </div>
                    @error('nameCategory')
                            <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-4">Update</button>
        </form>
    </div>
</div>
@endsection