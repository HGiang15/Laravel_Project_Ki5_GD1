@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Home admin')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="mx-5">
    <div class="m-5">
        <div class="row mx-5" style="justify-content: space-around;">
            <div class="card bg-info" style="width: 14rem;">
                <div class="card-body text-center">
                    <h5 class="card-text text-white py-2">Users</h5>
                    <h3 style="border-radius: 100%; border: 1px solid #000; padding: 60px;">{{ $users }}</h3>
                </div>
            </div>

            <div class="card bg-danger" style="width: 14rem;">
                <div class="card-body text-center">
                    <h5 class="card-text text-white py-2">Categories</h5>
                    <h3 style="border-radius: 100%; border: 1px solid #000; padding: 60px;">{{$category}}</h3>
                </div>
            </div>

            <div class="card bg-success" style="width: 14rem;">
                <div class="card-body text-center">
                    <h5 class="card-text text-white py-2">Authors</h5>
                    <h3 style="border-radius: 100%; border: 1px solid #000; padding: 60px;">{{$author}}</h3>
                </div>
            </div>

            <div class="card bg-secondary" style="width: 14rem;">
                <div class="card-body text-center">
                    <h5 class="card-text text-white py-2">Articles</h5>
                    <h3 style="border-radius: 100%; border: 1px solid #000; padding: 60px;">{{$article}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection