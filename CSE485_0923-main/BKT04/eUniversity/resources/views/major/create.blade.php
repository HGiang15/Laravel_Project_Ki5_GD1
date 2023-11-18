@extends('layouts.base')

@section('title','MAJOR LIST')

@section('header','majors')

@section('main')
    <div class="m-5 mt-3 text-center">
        <div class="mx-5">
            <form action="{{ route('majors.store') }}" method="POST">
                @csrf
                @method('POST')
                {{-- tentp --}}
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text ms-5" id="addon-wrapping">Major's name</span>
                    <input type="text" class="form-control me-5" aria-describedby="addon-wrapping" name="name">
                </div>
                {{-- Mota --}}
                <div class="form-floating mx-5 mb-3">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="description"></textarea>
                    <label for="floatingTextarea2">Description</label>
                </div>
                {{-- Loại hinh --}}
                <div class="input-group mb-3">
                    <label class="input-group-text ms-5" for="inputGroupSelect01">Duration</label>
                    <select class="form-select me-5" id="inputGroupSelect01" name="duration">
                        <option value="4">4 năm</option>
                        <option value="5">5 năm</option>
                    </select>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end me-5">
                    <button type="submit" class="btn btn-success px-4 m-0">Add</button>
                    <a href="{{ route('majors.index') }}">
                        <button type="button" class="btn btn-warning px-4 m-0">Return</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection