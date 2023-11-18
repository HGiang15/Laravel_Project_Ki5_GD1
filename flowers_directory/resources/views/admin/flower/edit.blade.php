@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Edit flower')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Edit flower</h3>
            </div>
            <div class="col-md-6">
                <a href="{{ route('flowers.index') }}" class="btn btn-primary float-end">List flower</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('flowers.update', $flower->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    {{-- IDFlower --}}
                    <div class="form-group">
                        <label for="">ID</label>
                        <input type="text" name="id" class="form-control bg-warning" value="{{ $flower->id }}" readonly>
                    </div>
                    {{-- HoTen --}}
                    <div class="form-group">
                        <label for="">Name Flower</label>
                        <input type="text" name="name" class="form-control" value="{{ $flower->name }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Description --}}
                    <div class="form-floating mt-4">
                        <textarea class="form-control" placeholder="Leave a description here" id="floatingTextarea2" style="height: 100px" name="description">{{ $flower->description }}</textarea>
                        <label for="floatingTextarea2" class="text-secondary">Description</label>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Created_at --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">Created_at</span>
                        <input type="date" class="form-control me-5" aria-label="created_at" aria-describedby="addon-wrapping" name="created_at" value="{{ $flower->created_at }}">
                        @error('created_at')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    {{-- updated_at --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">Updated_at</span>
                        <input type="date" class="form-control me-5" aria-label="updated_at" aria-describedby="addon-wrapping" name="updated_at" value="{{ $flower->updated_at }}">
                        @error('updated_at')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- img --}}
                    <div class="form-group mt-4">
                        <label for="">Image URL</label>
                        <input type="file" name="image_url" class="form-control-file" accept="image/*" value="{{ $flower->image_url }}">
                        @if ($flower->image_url)
                            <img src="{{ asset($flower->image_url) }}" alt="img flower" style="max-width: 200px; margin-top: 10px;">
                        @endif
                        @error('image_url')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Region --}}
                    <div class="form-floating mt-4">
                        <textarea class="form-control" placeholder="Enter regions separated by commas" id="floatingTextarea3" style="height: 100px" name="region_name">{{ ltrim(implode(', ', $flower->regions->pluck('region_name')->toArray()))  }}</textarea>
                        <label for="floatingTextarea3" class="text-secondary">Region name</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-4">Update</button>
        </form>
    </div>
</div>
@endsection