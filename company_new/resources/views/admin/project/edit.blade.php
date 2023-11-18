@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Edit Project')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Edit Project</h3>       
            </div>
            <div class="col-md-6">
                <a href="{{ route('projects.index') }}" class="btn btn-primary float-end">Project List</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('projects.update', $project->P_No) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    {{-- ID --}}
                    <div class="form-group">
                        <label for="">ID</label>
                        <input type="text" name="P_No" class="form-control bg-warning" value="{{ $project->P_No }}" readonly>
                    </div>
                    {{-- Name --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">Name project</label>
                        <input type="text" name="Name" class="form-control" value="{{ $project->Name }}">
                        @error('Name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Location --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">Location</label>
                        <input type="text" name="Location" class="form-control" value="{{ $project->Location }}">
                        @error('Location')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- idDepartment --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="inputGroupSelect01">idDepartment</label>
                        <select class="form-select me-5" id="inputGroupSelect01" name="idDepartment">
                            @foreach ($departments as $department)
                            @if($department->D_No == $project->idDepartment)
                                <option value="{{ $department->D_No }}" selected>
                                    {{ $department->D_No }}
                                </option>
                            @else
                                <option value="{{ $department->D_No }}">
                                    {{ $department->D_No }}
                                </option>
                            @endif
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
                            @foreach ($employees as $employee)
                            @if($employee->id == $project->idEmployee)
                                <option value="{{ $employee->id }}" selected>
                                    {{ $employee->id }}
                                </option>
                            @else
                                <option value="{{ $employee->id }}">
                                    {{ $employee->id }}
                                </option>
                            @endif
                        @endforeach
                        </select>
                        @error('idEmployee')
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