@extends('layouts.base')

@section('title','MAJOR LIST')

@section('header','majors')

@section('main')
    <div class="m-5 mb-3">
        <div class="m-5">
            <p><span>ID: </span>{{$major->id}}</p>
            <p><span>Major's name: </span>{{$major->name}}</p>
            <p><span>Description: </span>{{$major->description}}</p>
            <p><span>Duration: </span>{{$major->duration}}</p>
            <p><span>Created_at: </span>{{$major->created_at}}</p>
            <p><span>Updated_at: </span>{{$major->updated_at}}</p>
        </div>
    </div>
@endsection