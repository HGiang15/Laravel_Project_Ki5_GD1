@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Edit Computer')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Edit Computer</h3>       
            </div>
            <div class="col-md-6">
                <a href="{{ route('computers.index') }}" class="btn btn-primary float-end">List Computer</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('computers.update', $computer->ComputerID) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-12">
                    {{-- ComputerID --}}
                    <div class="form-group">
                        <label for="">ComputerID</label>
                        <input type="text" name="ComputerID" class="form-control bg-warning" value="{{ $computer->ComputerID }}" readonly>
                    </div>
                    {{-- LabID --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="inputGroupSelect01">LabID</label>
                        <select class="form-select me-5" id="inputGroupSelect01" name="LabID">
                            @foreach ($computerlabs as $computerlab)
                            @if($computerlab->LabID == $computer->LabID)
                                <option value="{{$computerlab->LabID}}" selected>
                                    {{ $computerlab->LabName }}
                                </option>
                            @else
                                <option value="{{$computerlab->LabID}}">
                                    {{ $computerlab->LabID }}
                                </option>
                            @endif
                        @endforeach
                        </select>
                        @error('LabID')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- ComupterName --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">ComupterName</span>
                        <input type="text" name="ComupterName" class="form-control" value="{{ $computer->ComupterName }}">
                        @error('ComupterName')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Configuration --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">Configuration</span>
                        <input type="text" name="Configuration" class="form-control" value="{{ $computer->Configuration }}">
                        @error('Configuration')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- ComputerStatus --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">ComputerStatus</span>
                        <input type="text" name="ComputerStatus" class="form-control" value="{{ $computer->ComputerStatus }}">
                        @error('ComputerStatus')
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