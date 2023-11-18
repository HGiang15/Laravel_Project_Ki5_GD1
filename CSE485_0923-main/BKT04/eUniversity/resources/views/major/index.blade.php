@extends('layouts.base')

@section('title','MAJOR LIST')

@section('header','majors')

@section('main')
    <div class="mx-5">
        <a href="{{ route('majors.create') }}" class="mx-5">
            <button type="button" class="btn btn-success mb-3 mx-0">ADD NEW</button>
        </a>
        <div class="card-body mx-5">
            @if (Session::has('information'))
                <div class="alert alert-success">
                    {{ Session::get('information') }}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Duration</th>
                        <th class="text-center" style="min-width: 79px">Detail</th>
                        <th class="text-center" style="min-width: 79px">Edit</th>
                        <th class="text-center" style="min-width: 79px">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @if ( request()->input('page', 1) =='1') 
                        <tr>
                            <td class="text-center">{{ $latestItem->id }}</td>
                            <td class="text-center">{{ $latestItem->name }}</td>
                            <td class="text-center">{{ $latestItem->description }}</td>
                            <td class="text-center">{{ $latestItem->duration }} year</td>

                            <td class="text-center">
                                <a href="{{ route('majors.show', $latestItem->id) }}" class="btn btn-secondary mx-0">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-info mx-0" href="{{ route('majors.edit', $latestItem->id) }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-danger mx-0" href="" data-bs-toggle="modal" data-bs-target="#modal{{$latestItem->id}}">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                            <!-- Modal -->
                            <div class="modal fade" id="modal{{ $latestItem->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE MAJOR</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete the major with this id: {{ $latestItem->id }} ?
                                        </div>
                                        <div class="modal-footer">  
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('majors.destroy', $latestItem->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-primary">Yes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endif
                    @foreach ($majors as $major)
                        <tr>
                            <td class="text-center">{{ $major->id }}</td>
                            <td class="text-center">{{ $major->name }}</td>
                            <td class="text-center">{{ $major->description }}</td>
                            <td class="text-center">{{ $major->duration }} year</td>
    
                            <td class="text-center">
                                <a href="{{ route('majors.show', $major->id) }}" class="btn btn-secondary mx-0">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-info mx-0" href="{{ route('majors.edit', $major->id) }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-danger mx-0" href="" data-bs-toggle="modal" data-bs-target="#modal{{$major->id}}">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                            <!-- Modal -->
                            <div class="modal fade" id="modal{{ $major->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE MAJOR</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete the major with this id: {{ $major->id }} ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('majors.destroy', $major->id) }}" method="POST">
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
                {{ $majors->links() }}
            </div>
        </div>
    </div>
@endsection