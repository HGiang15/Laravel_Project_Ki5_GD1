@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Edit Employee')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Edit Employee</h3>       
            </div>
            <div class="col-md-6">
                <a href="{{ route('employees.index') }}" class="btn btn-primary float-end">Employee List</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    {{-- ID --}}
                    <div class="form-group">
                        <label for="">ID</label>
                        <input type="text" name="id" class="form-control bg-warning" value="{{ $employee->id }}" readonly>
                    </div>
                    {{-- Name --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">Name Employee</label>
                        <input type="text" name="Name" class="form-control" value="{{ $employee->Name }}">
                        @error('Name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Address --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">Address</label>
                        <input type="text" name="Address" class="form-control" value="{{ $employee->Address }}">
                        @error('Address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Gender --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="inputGroupSelect01">Gender</label>
                        <select class="form-select me-5" id="inputGroupSelect01" name="Gender">
                            <option value="" selected>Chọn</option>
                            <option value="Male" @if ($employee->Gender == 'Male') selected @endif>Male</option>
                            <option value="Female" @if ($employee->Gender == 'Female') selected @endif>Female</option>
                            <option value="Other" @if ($employee->Gender == 'Other') selected @endif>Other</option>
                        </select>
                        @error('Gender')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    {{-- DateOfBirth --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">DateOfBirth</span>
                        <input type="date" class="form-control me-5" aria-label="DateOfBirth" aria-describedby="addon-wrapping" name="DateOfBirth" value="{{ $employee->DateOfBirth }}">
                        @error('DateOfBirth')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- DateOfJob --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">DateOfJob</span>
                        <input type="date" class="form-control me-5" aria-label="DateOfJob" aria-describedby="addon-wrapping" name="DateOfJob" value="{{ $employee->DateOfJob }}">
                        @error('DateOfJob')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- idDepartment --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="inputGroupSelect01">idDepartment</label>
                        <select class="form-select me-5" id="inputGroupSelect01" name="idDepartment">
                            @foreach ($departments as $department)
                            @if($department->D_No == $employee->idDepartment)
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
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-4">Save</button>
        </form>
    </div>
</div>
@endsection