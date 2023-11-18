@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Dependent')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Dependent <i class="fa-solid fa-heart text-danger mx-1"></i></h3>
            </div>
            <div class="col-md-6">
                <a href="{{ route('dependents.create') }}" class="btn btn-success float-end">Add new Dependent</a>
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
                    <th>D_name</th>
                    <th>Gender</th>
                    <th>Relationship</th>
                    <th>idEmployee</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dependents as $dependent)
                    <tr>
                        <td>{{ $dependent->D_name }}</td>
                        <td>{{ $dependent->Gender }}</td>
                        <td>{{ $dependent->Relationship }}</td>
                        <td>{{ $dependent->idEmployee }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination custom-pagination justify-content-center">
            {{ $dependents->links() }}
        </div>
    </div>
</div>

@endsection