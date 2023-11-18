@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Flight')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Flight <i class="fa-solid fa-plane-circle-check text-danger mx-1"></i></h3>
            </div>
            <div class="col-md-6">
                <a href="{{ route('flights.create') }}" class="btn btn-success float-end">Add new Flight</a>
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
                    <th>FlightNumber</th>
                    <th>From</th>
                    <th>To</th>
                    <th>DepartureDate</th>
                    <th>DepartureTime</th>
                    <th>ArrivalDate</th>
                    <th>ArrivalTime</th>
                    <th>idAirplane</th>
                    <th class="text-center">Detail</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($flights as $flight)
                    <tr>
                        <td>{{ $flight->FlightNumber }}</td>
                        <td>{{ $flight->From }}</td>
                        <td>{{ $flight->To }}</td>
                        <td>{{ $flight->DepartureDate }}</td>
                        <td>{{ $flight->DepartureTime }}</td>
                        <td>{{ $flight->ArrivalDate }}</td>
                        <td>{{ $flight->ArrivalTime }}</td>
                        <td class="text-center">{{ $flight->idAirplane }}</td>
                        <td class="text-center">
                            <a href="" class="btn btn-secondary">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('flights.edit', $flight->FlightNumber) }}" class="btn btn-info">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-danger" href="" data-bs-toggle="modal" data-bs-target="#modal{{ $flight->FlightNumber }}">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                        <!-- Modal -->
                        <div class="modal fade" id="modal{{ $flight->FlightNumber }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE FLIGHT</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Do you want to delete this flight with id  {{ $flight->FlightNumber  }} ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <form action="{{ route('flights.destroy', $flight->FlightNumber ) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary">Yes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination custom-pagination justify-content-center">
            {{ $flights->links() }}
        </div>
    </div>
</div>

@endsection