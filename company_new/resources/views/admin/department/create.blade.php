@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Add Department')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Add new Department</h3>       
            </div>
            <div class="col-md-6">
                <a href="{{ route('departments.index') }}" class="btn btn-primary float-end">Department List</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('departments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    {{-- Name --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">Name</label>
                        <input type="text" name="Name" class="form-control" placeholder="Enter Name department">
                        @error('Name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Location --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">Location department</label>
                        <input type="text" name="Location" class="form-control" placeholder="Enter location">
                        @error('Location')
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