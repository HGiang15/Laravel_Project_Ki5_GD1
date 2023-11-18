@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Edit Department')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Edit Department</h3>       
            </div>
            <div class="col-md-6">
                <a href="{{ route('departments.index') }}" class="btn btn-primary float-end">Department List</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('departments.update', $department->D_No) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    {{-- D_No --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">D_No</label>
                        <input type="text" name="BookID" class="form-control bg-warning" value="{{ $department->D_No }}" readonly>
                    </div>
                    {{-- Name --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">Name</label>
                        <input type="text" name="Name" class="form-control"  value="{{ $department->Name }}">
                        @error('Name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Location --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">Location department</label>
                        <input type="text" name="Location" class="form-control"  value="{{ $department->Location }}">
                        @error('Location')
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