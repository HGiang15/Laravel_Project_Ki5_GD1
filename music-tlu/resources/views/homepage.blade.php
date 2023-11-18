@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Trang chủ Homepage')

@section('header')
    @include('layouts.header1')
@endsection

@section('main')
<div class="row">
    <div class="col-12">
        <div class="bg">
            <img class="" style="width: 100%; height: 500px" src="{{asset('/assets/img/bgbh.png')}}" alt="">
        </div>
    </div>
</div>
<div class="row text-center mt-3">
    <span class="text-success fs-4">TOP BÀI HÁT YÊU THÍCH</span>
</div>
<div class="row mt-3">
    @foreach ($articles as $article) 
    <div class="col-3 my-3">
        <a href="{{ route('homepage.show',$article->idArticle)}}" class="mb-2 text-decoration-none text-dark fw-bold">
            <div style="display:inline;" class="text-center">
                <div style="display:inline; flex-wrap: wrap;" class="d-flex justify-content-center align-items-center">
                    <img src="{{ $article->imgArticle }}" alt="Hình ảnh" height="180rem" width="100%" style="border: 1px solid black;" class="rounded-top-2">
                    <br>
                    <div style="border: 1px solid black; width:100%; height:3rem" class="rounded-bottom-2 d-flex justify-content-center align-items-center">
                        <span class="fs-6">{{$article->nameSong}}</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>
@endsection