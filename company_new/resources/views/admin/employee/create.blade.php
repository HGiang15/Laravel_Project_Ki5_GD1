@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Add Employee')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Add new Employee</h3>       
            </div>
            <div class="col-md-6">
                <a href="{{ route('employees.index') }}" class="btn btn-primary float-end">Employee List</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    {{-- Name --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">Name Employee</label>
                        <input type="text" name="Name" class="form-control" placeholder="Enter Name employee">
                        @error('Name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Address --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">Address</label>
                        <input type="text" name="Address" class="form-control" placeholder="Enter address">
                        @error('Address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Gender --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="inputGroupSelect01">Gender</label>
                        <select class="form-select me-5" id="inputGroupSelect01" name="Gender">
                            <option value="" selected>Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
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
                        <input type="date" class="form-control me-5" aria-label="DateOfBirth" aria-describedby="addon-wrapping" name="DateOfBirth">
                        @error('DateOfBirth')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- DateOfJob --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">DateOfJob</span>
                        <input type="date" class="form-control me-5" aria-label="DateOfJob" aria-describedby="addon-wrapping" name="DateOfJob">
                        @error('DateOfJob')
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
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-4">Save</button>
        </form>
    </div>
</div>
@endsection