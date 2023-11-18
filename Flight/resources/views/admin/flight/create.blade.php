@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Add Flight')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Add new Flight</h3>       
            </div>
            <div class="col-md-6">
                <a href="{{ route('flights.index') }}" class="btn btn-primary float-end">List Flight</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('flights.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    {{-- From --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">From</span>
                        <input type="text" name="From" class="form-control" placeholder="Enter From: VietNam, Japan,...">
                        @error('From')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- To --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">To</span>
                        <input type="text" name="To" class="form-control" placeholder="Enter To: VietNam, Japan,...">
                        @error('To')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- DepartureDate --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">DepartureDate</span>
                        <input type="date" class="form-control me-5" aria-label="DepartureDate" aria-describedby="addon-wrapping" name="DepartureDate">
                        @error('DepartureDate')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- DepartureTime --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">DepartureTime</span>
                        <input type="time" class="form-control me-5" aria-label="DepartureTime" aria-describedby="addon-wrapping" name="DepartureTime">
                        @error('DepartureTime')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    {{-- ArrivalDate --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">ArrivalDate</span>
                        <input type="date" class="form-control me-5" aria-label="ArrivalDate" aria-describedby="addon-wrapping" name="ArrivalDate">
                        @error('ArrivalDate')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- ArrivalTime --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">ArrivalTime</span>
                        <input type="time" class="form-control me-5" aria-label="ArrivalTime" aria-describedby="addon-wrapping" name="ArrivalTime">
                        @error('ArrivalTime')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- idAirplane --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="inputGroupSelect01">ID Airplane</label>
                        <select class="form-select me-5" id="inputGroupSelect01" name="idAirplane">
                            <option value="" selected>Select</option>
                            @foreach ($airplanes as $airplane)
                                <option value="{{ $airplane->RegistrationNumber }}">{{ $airplane->RegistrationNumber }}</option>
                            @endforeach
                        </select>
                        @error('idAirplane')
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