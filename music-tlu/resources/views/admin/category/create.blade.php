@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Add Category')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Add new Category</h3>
            </div>
            <div class="col-md-6">
                <a href="{{ route('categories.index') }}" class="btn btn-primary float-end">List Category</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    {{-- HoTen --}}
                    <div class="form-group">
                        <label for="">Name Category</label>
                        <input type="text" name="nameCategory" class="form-control" placeholder="Enter name category">
                        @error('nameCategory')
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