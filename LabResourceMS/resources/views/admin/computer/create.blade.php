@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Add Computer')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Add new Computer</h3>       
            </div>
            <div class="col-md-6">
                <a href="{{ route('computers.index') }}" class="btn btn-primary float-end">List Computer</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('computers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    {{-- LabID --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="inputGroupSelect01">LabID</label>
                        <select class="form-select me-5" id="inputGroupSelect01" name="LabID">
                            <option value="" selected>Select</option>
                            @foreach ($computerlabs as $computerlab)
                                <option value="{{ $computerlab->LabID }}">
                                    {{$computerlab->LabID}}
                                </option>
                            @endforeach
                        </select>
                        @error('LabID')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- ComupterName --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">ComupterName</span>
                        <input type="text" name="ComupterName" class="form-control" placeholder="Enter ComupterName">
                        @error('ComupterName')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Configuration --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">Configuration</span>
                        <input type="text" name="Configuration" class="form-control" placeholder="Enter Configuration">
                        @error('Configuration')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- ComputerStatus --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">ComputerStatus</span>
                        <input type="text" name="ComputerStatus" class="form-control" placeholder="Enter ComputerStatus">
                        @error('ComputerStatus')
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