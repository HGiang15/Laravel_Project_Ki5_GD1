@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Passenger')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Passenger <i class="fa-solid fa-person text-primary mx-1"></i></h3>
            </div>
            <div class="col-md-6">
                <a href="{{ route('passengers.create') }}" class="btn btn-success float-end">Add new Passenger</a>
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
                    <th>EmailAddress</th>
                    <th>GivenNames</th>
                    <th>Surname</th>
                    <th class="text-center">Detail</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($passengers as $passenger)
                    <tr>
                        <td>{{ $passenger->EmailAddress }}</td>
                        <td>{{ $passenger->GivenNames }}</td>
                        <td>{{ $passenger->Surname }}</td>
                        <td class="text-center">
                            <a href="" class="btn btn-secondary">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            {{-- {{ route('passengers.edit', $passenger->EmailAddress) }} --}}
                            <a href="" class="btn btn-info">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-danger" href="" data-bs-toggle="modal" data-bs-target="#modal{{ $passenger->EmailAddress }}">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                        <!-- Modal -->
                        <div class="modal fade" id="modal{{ $passenger->EmailAddress }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE PASSENGER</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Do you want to delete this passenger with id  {{ $passenger->EmailAddress }} ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        {{-- {{ route('airplanes.destroy', $passenger->EmailAddress ) }} --}}
                                        <form action="{{ route('passengers.destroy', $passenger->EmailAddress ) }}" method="POST">
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
            {{ $passengers->links() }}
        </div>
    </div>
</div>

@endsection