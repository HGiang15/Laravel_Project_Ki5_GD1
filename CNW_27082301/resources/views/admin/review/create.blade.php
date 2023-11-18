@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Add Review')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Add new Review</h3>       
            </div>
            <div class="col-md-6">
                <a href="{{ route('reviews.index') }}" class="btn btn-primary float-end">Review List</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    {{-- BookID --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="inputGroupSelect01">BookID</label>
                        <select class="form-select me-5" id="inputGroupSelect01" name="BookID">
                            <option value="" selected>Select</option>
                            @foreach ($books as $book)
                                <option value="{{$book->BookID}}">
                                    {{ $book->BookID }}
                                </option>
                            @endforeach
                        </select>
                        @error('BookID')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- UserID --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="inputGroupSelect01">UserID</label>
                        <select class="form-select me-5" id="inputGroupSelect01" name="UserID">
                            <option value="" selected>Select</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user->id }}
                                </option>
                            @endforeach
                        </select>
                        @error('UserID')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Rating --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="inputGroupSelect01">Rating</label>
                        <select class="form-select me-5" id="inputGroupSelect01" name="Rating">
                            <option value="" selected>Select star</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        @error('Rating')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- ReviewText --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">ReviewText</label>
                        <input type="text" name="ReviewText" class="form-control" placeholder="Enter ReviewText">
                        @error('ReviewText')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- ReviewDate --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">ReviewDate</label>
                        <input type="date" name="ReviewDate" class="form-control" >
                        @error('ReviewDate')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-4">Save</button>
        </form>
    </div>
</div>
@endsection