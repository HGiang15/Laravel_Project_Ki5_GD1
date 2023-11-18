@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Add ComputerLab')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Add new ComputerLab</h3>       
            </div>
            <div class="col-md-6">
                <a href="{{ route('computerlabs.index') }}" class="btn btn-primary float-end">List ComputerLab</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('computerlabs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    {{-- LabName --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">LabName</span>
                        <input type="text" name="LabName" class="form-control" placeholder="Enter LabName">
                        @error('LabName')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- NumberOfComputers --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">NumberOfComputers</span>
                        <input type="number" name="NumberOfComputers" class="form-control" placeholder="Enter NumberOfComputers">
                        @error('NumberOfComputers')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Status --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">Status</span>
                        <input type="text" name="Status" class="form-control" placeholder="Enter Status">
                        @error('Status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Description --}}
                    <div class="form-floating mt-4">
                        <textarea class="form-control" placeholder="Leave a Description here" id="floatingTextarea2" style="height: 100px" name="Description"></textarea>
                        <label for="floatingTextarea2" class="text-secondary">Description</label>
                        @error('Description')
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