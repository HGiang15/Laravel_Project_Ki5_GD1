@extends('layouts.base')

@section('title','MAJOR LIST')

@section('header','majors')

@section('main')
    <div class="m-5 mt-3 text-center">
        <div class="m-5">
            <div style="min-width: 700px">
                <form action="{{ route('majors.update', $major->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    {{-- id --}}
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text ms-5" id="addon-wrapping">Id</span>
                        <input type="text" class="form-control me-5" aria-describedby="addon-wrapping" name="id" value="{{ $major->id }}" readonly>
                    </div>
                    {{-- tentp --}}
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text ms-5" id="addon-wrapping">Major's name</span>
                        <input type="text" class="form-control me-5" aria-describedby="addon-wrapping" name="name" value="{{ $major->name }}">
                    </div>
                    {{-- Mota --}}
                    <div class="form-floating mx-5 mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="description">{{ $major->description }}</textarea>
                        <label for="floatingTextarea2">Description</label>
                    </div>
                    {{-- Loại hinh --}}
                    <div class="input-group mb-3">
                        <label class="input-group-text ms-5" for="inputGroupSelect01">Duration</label>
                        <select class="form-select me-5" id="inputGroupSelect01" name="duration">
                            <option value="4" @if ($major->duration == '4') selected @endif>4 năm</option>
                                <option value="5" @if ($major->duration == '5') selected @endif>5 năm</option>
                        </select>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end me-5">
                        <button type="submit" class="btn btn-success px-4 m-0">Update</button>
                        <a href="{{ route('majors.index') }}">
                            <button type="button" class="btn btn-warning px-4 m-0">Return</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection