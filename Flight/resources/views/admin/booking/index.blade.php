@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Booking')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Booking <i class="fa-solid fa-ticket text-secondary mx-1"></i></h3>
            </div>
            <div class="col-md-6">
                <a href="{{ route('bookings.index') }}" class="btn btn-success float-end">List Booking</a>
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
                    <th>idFlight</th>
                    <th>idPassenger</th>
                    <th class="text-center">Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->idFlight }}</td>
                        <td>{{ $booking->idPassenger }}</td>
                        <td class="text-center">
                            <a href="" class="btn btn-secondary">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination custom-pagination justify-content-center">
            {{ $bookings->links() }}
        </div>
    </div>
</div>

@endsection