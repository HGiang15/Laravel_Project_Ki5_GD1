@extends('layouts.base')

@section('title', 'Detail Author')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="container p-5 shadow">
    <div class="row">
        @if (Session::has('information'))
            <div class="alert alert-success">
                {{ Session::get('information') }}
            </div>
        @elseif (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
        <div class="col-md-4">
            <img src="{{ $author->imgAuthor }}" alt="{{ $author->nameAuthor }}" style="height: 20rem; width: 20rem; border-radius: 20px;">
        </div>
        <div class="col-md-4">
            <h2 class="text-success fst-italic">Infomation Author</h2>
            <div class="card">
                <div class="card-body">
                    <p><span class="card-title fw-bold">ID Author: </span>{{ $author->idAuthor }}</p>
                    <p><span class="card-title fw-bold">Name Author: </span>{{ $author->nameAuthor }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <a href="{{ route('authors.edit', $author->idAuthor ) }}" class="btn btn-info">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <a class="btn btn-danger" href="" data-bs-toggle="modal" data-bs-target="#modal{{ $author->idAuthor }}">
                <i class="fa-solid fa-trash"></i>
            </a>
            <!-- Modal -->
            <div class="modal fade" id="modal{{ $author->idAuthor }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE AUTHOR</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Do you want to delete this author with id  {{ $author->idAuthor  }} ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="{{ route('authors.destroy', $author->idAuthor ) }} " method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('authors.index') }}" class="btn btn-success">Author List</a>
        </div>
    </div>

</div>
@endsection