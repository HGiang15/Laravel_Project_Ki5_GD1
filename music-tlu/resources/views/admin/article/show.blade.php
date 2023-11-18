@extends('layouts.base')

@section('title', 'Detail Article')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="container p-5 shadow">
    <div class="row">
        <div class="col-md-4 mt-5">
            <img src="{{ $article->imgArticle }}" alt="{{ $article->imgArticle }}" style="height: 20rem; width: 20rem; border-radius: 20px;">
        </div>
        <div class="col-md-5">
            <h2 class="text-success text-center fst-italic">Article Information</h2>
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-primary fs-4 fw-bold"><span>{{ $article->title }}</span></p>
                    <p><span class="card-title fw-bold">ID: </span>{{ $article->idArticle }}</p>
                    <p><span class="card-title fw-bold">Name Song: </span>{{ $article->nameSong }}</p>
                    <p><span class="card-title fw-bold">idCategory: </span>{{ $article->idCategory }}</p>
                    <p><span class="card-title fw-bold">Category: </span>{{ $category->nameCategory }}</p>
                    <p><span class="card-title fw-bold">Summary: </span>{{ $article->summary }}</p>
                    <p><span class="card-title fw-bold">Content: </span>{{ $article->content }}</p>
                    <p><span class="card-title fw-bold">idAuthor: </span>{{ $article->idAuthor }}</p>
                    <p><span class="card-title fw-bold">Author: </span>{{ $author->nameAuthor }}</p>
                    <p><span class="card-title fw-bold">Date Write: </span>{{ $article->dateW }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-5">
            <a href="{{ route('articles.edit', $article->idArticle ) }}" class="btn btn-info">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <a class="btn btn-danger" href="" data-bs-toggle="modal" data-bs-target="#modal{{ $article->idArticle }}">
                <i class="fa-solid fa-trash"></i>
            </a>
            <!-- Modal -->
            <div class="modal fade" id="modal{{ $article->idArticle }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE ARTICLE</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Do you want to delete this article with id  {{ $article->idArticle  }} ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="{{ route('articles.destroy', $article->idArticle ) }} " method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('articles.index') }}" class="btn btn-success">Article List</a>
        </div>
    </div>

</div>
@endsection