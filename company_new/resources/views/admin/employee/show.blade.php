@extends('layouts.base')

@section('title', 'Detail employee')

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
            
            <h2 class="text-success text-center fst-italic">Employee Information</h2>
            <div class="card">
                <div class="card-body">
                    <p><span class="card-title fw-bold">ID Employee: </span>{{ $employee->id }}</p>
                    <p><span class="card-title fw-bold">Name employee: </span>{{$employee->Name}}</p>
                    <p><span class="card-title fw-bold">Address: </span>{{ $employee->Address }}</p>
                    <p><span class="card-title fw-bold">Gender: </span>{{ $employee->Gender }}</p>
                    <p><span class="card-title fw-bold">Date Of Birth: </span>{{ $employee->DateOfBirth }}</p>
                    <p><span class="card-title fw-bold">Date Of Job: </span>{{ $employee->DateOfJob }}</p>
                    <p><span class="card-title fw-bold">idDepartment: </span>{{ $employee->idDepartment }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-5">
            <a href="{{ route('employees.edit', $employee->id ) }}" class="btn btn-info">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <a class="btn btn-danger" href="" data-bs-toggle="modal" data-bs-target="#modal{{ $employee->id }}">
                <i class="fa-solid fa-trash"></i>
            </a>
            <!-- Modal -->
            <div class="modal fade" id="modal{{ $employee->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE EMPLOYEE</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Do you want to delete this employee with id  {{ $employee->id  }} ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="{{ route('employees.destroy', $employee->id ) }} " method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('employees.index') }}" class="btn btn-success">Employee List</a>
        </div>
    </div>

</div>
@endsection