@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Flower')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Flower <i class="fa-brands fa-slack text-success mx-1"></i></h3>
            </div>
            <div class="col-md-6">
                <a href="{{ route('flowers.create') }}" class="btn btn-success float-end">Add new Flower</a>
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
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th class="text-center">Image_URL</th>
                    {{-- <th>Created_at</th> --}}
                    {{-- <th>Updated_at</th> --}}
                    <th class="text-center">Detail</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($flowers as $flower)
                    <tr>
                        <td>{{ $flower->id }}</td>
                        <td>{{ $flower->name }}</td>
                        <td>{{ $flower->description }}</td>
                        <td class="text-center"><img width="250" height="250" src="{{ asset( $flower->image_url ) }}" alt=""></td>
                        {{-- <td>{{ $flower->created_at }}</td> --}}
                        {{-- <td>{{ $flower->updated_at }}</td> --}}
                        <td class="text-center">
                            <a href="{{ route('flowers.show', $flower->id) }}" class="btn btn-secondary">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('flowers.edit', $flower->id ) }}" class="btn btn-info">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-danger" href="" data-bs-toggle="modal" data-bs-target="#modal{{ $flower->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                        <!-- Modal -->
                        <div class="modal fade" id="modal{{ $flower->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE FLIGHT</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Do you want to delete this flower with id  {{ $flower->id  }} ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <form action="{{ route('flowers.destroy', $flower->id ) }} " method="POST">
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
            {{ $flowers->links() }}
        </div>
    </div>
</div>

@endsection