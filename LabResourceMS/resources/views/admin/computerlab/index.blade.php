@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Computer Lab')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Computer Lab</h3>
            </div>
            <div class="col-md-6">
                <a href="{{ route('computerlabs.create') }}" class="btn btn-success float-end">Add new Computer Lab</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if (Session::has('information'))
            <div class="alert alert-success">
                {{ Session::get('information') }}
            </div>
        @elseif (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>LabID</th>
                    <th>LabName</th>
                    <th>NumberOfComputers</th>
                    <th>Status</th>
                    <th>Description</th>
                    {{-- <th class="text-center">Edit</th> --}}
                    {{-- <th class="text-center">Remove</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($computerlabs as $computerlab)
                    <tr>
                        <td>{{ $computerlab->LabID }}</td>
                        <td>{{ $computerlab->LabName }}</td>
                        <td>{{ $computerlab->NumberOfComputers }}</td>
                        <td>{{ $computerlab->Status }}</td>
                        <td>{{ $computerlab->Description }}</td>


                    
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination custom-pagination justify-content-center">
            {{ $computerlabs->links() }}
        </div>
    </div>
</div>

@endsection