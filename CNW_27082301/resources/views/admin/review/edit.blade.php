@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Edit Review')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Edit Review</h3>       
            </div>
            <div class="col-md-6">
                <a href="{{ route('reviews.index') }}" class="btn btn-primary float-end">Review List</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('reviews.update', $review->ReviewID) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    {{-- ReviewID --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">ReviewID</label>
                        <input type="text" name="ReviewID" class="form-control bg-warning" value="{{ $review->ReviewID }}" readonly>
                    </div>
                    {{-- BookID --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="inputGroupSelect01">BookID</label>
                        <select class="form-select me-5" id="inputGroupSelect01" name="BookID">
                            @foreach ($books as $book)
                            @if($book->BookID == $review->BookID)
                                <option value="{{ $book->BookID }}" selected>
                                    {{ $book->BookID }}
                                </option>
                            @else
                                <option value="{{ $book->BookID }}">
                                    {{ $book->BookID }}
                                </option>
                            @endif
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
                            @foreach ($users as $user)
                            @if($user->id == $review->UserID)
                                <option value="{{ $user->id }}" selected>
                                    {{ $user->id }}
                                </option>
                            @else
                                <option value="{{ $user->id }}">
                                    {{ $user->id }}
                                </option>
                            @endif
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
                            <option value="" selected>Chọn</option>
                            <option value="1" @if ($review->Rating == '1') selected @endif>1</option>
                            <option value="2" @if ($review->Rating == '2') selected @endif>2</option>
                            <option value="3" @if ($review->Rating == '3') selected @endif>3</option>
                            <option value="4" @if ($review->Rating == '4') selected @endif>4</option>
                            <option value="5" @if ($review->Rating == '5') selected @endif>5</option>
                        </select>
                        @error('Rating')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- ReviewText --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">ReviewText</label>
                        <input type="text" name="ReviewText" class="form-control" value="{{ $review->ReviewText }}">
                        @error('ReviewText')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- ReviewDate --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="regions">ReviewDate</label>
                        <input type="date" name="ReviewDate" class="form-control" value="{{ $review->ReviewDate }}">
                        @error('ReviewDate')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-4">Update</button>
        </form>
    </div>
</div>
@endsection