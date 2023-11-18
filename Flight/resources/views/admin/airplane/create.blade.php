@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Add Airplane')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Add new Airplane</h3>       
            </div>
            <div class="col-md-6">
                <a href="{{ route('airplanes.index') }}" class="btn btn-primary float-end">List Airplane</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('airplanes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    {{-- ModeNumber --}}
                    <div class="form-group">
                        <span class="input-group-text" id="addon-wrapping">ModeNumber</span>
                        <input type="text" name="ModeNumber" class="form-control" placeholder="Enter modeNumber: abc123,...">
                        @error('ModeNumber')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Capacity --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">Capacity</span>
                        <input type="text" name="Capacity" class="form-control" placeholder="Enter Capacity">
                        @error('Capacity')
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