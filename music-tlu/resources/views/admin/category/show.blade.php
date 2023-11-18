@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Chi tiết thể loại')

@section('header')
    @include('layouts.header')
@endsection


@section('main')
    <div class="row">
        <div class="col-md-6">
            <h5>Mã thể loại {{ $category->idCategory }}</h5>
            <h5>Tên thể loại {{ $category->nameCategory }}</h5>
        </div>
        <div class="col-md-6">

        </div>
    </div>

@endsection