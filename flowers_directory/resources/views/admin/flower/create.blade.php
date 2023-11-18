@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Add Flower')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Add new Flower</h3>       
            </div>
            <div class="col-md-6">
                <a href="{{ route('flowers.index') }}" class="btn btn-primary float-end">List Flower</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('flowers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    {{-- name --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">Name Flower</span>
                        <input type="text" name="name" class="form-control" placeholder="Enter name">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Description --}}
                    <div class="form-floating mt-4">
                        <textarea class="form-control" placeholder="Leave a description here" id="floatingTextarea2" style="height: 100px" name="description"></textarea>
                        <label for="floatingTextarea2" class="text-secondary">Description</label>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Created_at --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">Created_at</span>
                        <input type="date" class="form-control me-5" aria-label="created_at" aria-describedby="addon-wrapping" name="created_at">
                        @error('created_at')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    {{-- updated_at --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">Updated_at</span>
                        <input type="date" class="form-control me-5" aria-label="updated_at" aria-describedby="addon-wrapping" name="updated_at">
                        @error('updated_at')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- img --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="">Upload img_flower</label>
                        <input type="file" name="image_url" class="form-control-file" >
                        @error('image_url')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- region --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">Regions</label>
                        <input type="text" name="region_name" class="form-control" placeholder="Enter regions (separated by comma)">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-4">Save</button>
        </form>

        <form class="d-flex mt-4" role="search" method="GET" action="{{ route('flowers.searchRegions') }}">
            <input class="form-control me-2" type="search" name="search" placeholder="Find cities where flowers already exist" aria-label="Search">
            <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        
        {{-- @if (isset($searchTerm))
            <h3>Search results for Region: {{ $searchTerm }}</h3>
        @endif --}}
        
        <div style="max-height: 200px; overflow-y: auto;">
            @if (!empty($existingRegions))
                <select class="form-control">
                    @foreach ($existingRegions as $region)
                        <option value="{{ $region }}">{{ $region }}</option>
                    @endforeach
                </select>
            @else
                <p class="input-group-text">No matching regions found</p>
            @endif
        </div>
        {{-- <div class="form-group mt-4">
            <label class="input-group-text" for="regions">Existing Regions</label>
            <select name="region_name[]" class="form-control" multiple>
                @foreach($existingRegions as $region)
                <option value="{{ $region }}">{{ $region }}</option>
                @endforeach
            </select>
        </div> --}}
    </div>
</div>
@endsection