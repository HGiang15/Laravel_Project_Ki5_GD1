@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Chi tiết')

@section('header')
    @include('layouts.header1')
@endsection

@section('main')
<div class="m-5 mb-3">
    <div class="d-flex justify-content-center">
        <div style="width:21rem;">
            <img src="{{$article->imgArticle}}" alt="" style="height:20rem; width:20rem; border-radius: 20px;">
        </div>
        <div class="w-75 mx-5">
            <h3 class="text-danger">Chi tiết bài hát</h3>
            <h5 class="text-primary">{{$article->title}}</h5>
            <p><span class="fw-bold">Bài hát: </span>{{$article->nameSong}}</p>
            <p><span class="fw-bold">Thể loại: </span>{{$category->nameCategory}}</p>
            <p><span class="fw-bold">Tóm tắt: </span>{{$article->summary}}</p>
            <p><span class="fw-bold">Nội dung: </span>{{$article->content}}</p>
            <p><span class="fw-bold">Tác giả: </span>{{$author->nameAuthor}}</p>
        </div>
    </div>
</div>
@endsection