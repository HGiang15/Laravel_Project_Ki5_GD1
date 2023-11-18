@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Add Project')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Add new Project</h3>       
            </div>
            <div class="col-md-6">
                <a href="{{ route('projects.index') }}" class="btn btn-primary float-end">Project List</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    {{-- Name --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">Name project</label>
                        <input type="text" name="Name" class="form-control" placeholder="Enter Name project">
                        @error('Name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Location --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">Location</label>
                        <input type="text" name="Location" class="form-control" placeholder="Enter location">
                        @error('Location')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- idDepartment --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="inputGroupSelect01">idDepartment</label>
                        <select class="form-select me-5" id="inputGroupSelect01" name="idDepartment">
                            <option value="" selected>Select</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->D_No }}">{{ $department->D_No }}</option>
                            @endforeach
                        </select>
                        @error('idDepartment')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- idEmployee --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="inputGroupSelect01">idEmployee</label>
                        <select class="form-select me-5" id="inputGroupSelect01" name="idEmployee">
                            <option value="" selected>Select</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->id }}</option>
                            @endforeach
                        </select>
                        @error('idEmployee')
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