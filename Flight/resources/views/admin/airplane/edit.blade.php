@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Edit airplane')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Edit airplane</h3>
            </div>
            <div class="col-md-6">
                <a href="{{ route('airplanes.index') }}" class="btn btn-primary float-end">List airplane</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('airplanes.update', $airplane->RegistrationNumber) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    {{-- MaMB --}}
                    <div class="form-group">
                        <label for="">RegistrationNumber</label>
                        <input type="text" name="RegistrationNumber" class="form-control bg-warning" value="{{ $airplane->RegistrationNumber }}" readonly>
                    </div>
                    {{-- So hieu --}}
                    <div class="form-group">
                        <label for="">ModeNumber</label>
                        <input type="text" name="ModeNumber" class="form-control" value="{{ $airplane->ModeNumber }}">
                        @error('ModeNumber')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Dung tich --}}
                    <div class="form-group">
                        <label for="">Capacity</label>
                        <input type="number" name="Capacity" class="form-control" value="{{ $airplane->Capacity }}">
                        @error('Capacity')
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