@extends('layouts.base')

@section('title', 'Detail Flower')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="container p-5 shadow">
    <div class="row">    
        <div class="col-md-4">
            <img src="{{ asset( $flower->image_url ) }}" alt="" style="height: 20rem; width: 20rem; border-radius: 20px;">
        </div>
        <div class="col-md-5">
            <h2 class="text-success">Flower Information</h2>
            <p><span class="fw-bold">Flower's name: </span>{{$flower->name}}</p>
            <p><span class="fw-bold">Description: </span>{{$flower->description}}</p>
            <p><span class="fw-bold">Region's name: </span>
                @if(count($flower->regions) > 0)
                    @foreach($flower->regions as $region)
                        <br>{{$region->region_name}}
                    @endforeach
                @else
                    Don't have region.
                @endif
            </p>
            <p><span class="fw-bold">Created_at: </span>{{$flower->created_at}}</p>
            <p><span class="fw-bold">Updated_at: </span>
                @if(($flower->updated_at))
                    {{$flower->updated_at}}
                @else
                    Don't have updated_at.
                @endif
            </p>
        </div>
        <div class="col-md-3">
            <td class="text-center">
                <a href="{{ route('flowers.edit', $flower->id ) }}" class="btn btn-info">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </td>
            <a class="btn btn-danger" href="" data-bs-toggle="modal" data-bs-target="#modal{{ $flower->id }}">
                <i class="fa-solid fa-trash"></i>
            </a>
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
            <a href="{{ route('flowers.index') }}">
                <button type="button" class="btn btn-warning px-4 m-0">Return</button>
            </a>
        </div>
    </div>
</div>
@endsection