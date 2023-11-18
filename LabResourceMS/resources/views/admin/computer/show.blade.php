@extends('layouts.base')

@section('title', 'Detail computer')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="container p-5 shadow">
    <div class="row">
        <div class="col-md-4 mt-5">
            <h2 class="bg-secondary p-5 text-white text-center fst-italic" style="border-radius: 50%">You're Welcome back !</h2>
            @if (Session::has('information'))
                <div class="alert alert-success">
                    {{ Session::get('information') }}
                </div>
            @elseif (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
        </div>
        <div class="col-md-5">
            
            <h2 class="text-success text-center fst-italic">Computer Information</h2>
            <div class="card">
                <div class="card-body">
                    <p><span class="card-title fw-bold">Computer ID: </span>{{ $computer->ComputerID }}</p>
                    <p><span class="card-title fw-bold">Lab ID: </span>{{ $computer->LabID }}</p>
                    <p><span class="card-title fw-bold">Comupter Name: </span>{{ $computer->ComupterName }}</p>
                    <p><span class="card-title fw-bold">Configuration: </span>{{ $computer->Configuration }}</p>
                    <p><span class="card-title fw-bold">ComputerStatus: </span>{{ $computer->ComputerStatus }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-5">
            <a href="{{ route('computers.edit', $computer->ComputerID ) }}" class="btn btn-info">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <a class="btn btn-danger" href="" data-bs-toggle="modal" data-bs-target="#modal{{ $computer->ComputerID }}">
                <i class="fa-solid fa-trash"></i>
            </a>
            <!-- Modal -->
            <div class="modal fade" id="modal{{ $computer->ComputerID }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE COMPUTER</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Do you want to delete this computer with id  {{ $computer->ComputerID  }} ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="{{ route('computers.destroy', $computer->ComputerID ) }} " method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('computers.index') }}" class="btn btn-success">Computer List</a>
        </div>
    </div>

</div>
@endsection