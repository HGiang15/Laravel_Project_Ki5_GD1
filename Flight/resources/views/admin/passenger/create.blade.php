@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Add Passenger')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Add new Passenger</h3>       
            </div>
            <div class="col-md-6">
                <a href="{{ route('passengers.index') }}" class="btn btn-primary float-end">List Passenger</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('passengers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    {{-- EmailAddress --}}
                    <div class="form-group">
                        <span class="input-group-text" id="addon-wrapping">EmailAddress</span>
                        <input type="email" name="EmailAddress" class="form-control" placeholder="Enter EmailAddress: abc@gmail.com">
                        @error('EmailAddress')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- GivenNames --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">GivenNames</span>
                        <input type="text" name="GivenNames" class="form-control" placeholder="Enter GivenNames: Giang,...">
                        @error('GivenNames')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Surname --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">Surname</span>
                        <input type="text" name="Surname" class="form-control" placeholder="Enter Surname: Nguyen, Cristiano...">
                        @error('Surname')
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