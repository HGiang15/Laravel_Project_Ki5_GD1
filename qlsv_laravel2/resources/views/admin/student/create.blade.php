@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Thêm sinh viên')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Thêm mới sinh viên</h3>       
            </div>
            <div class="col-md-6">
                <a href="{{ route('students.index') }}" class="btn btn-primary float-end">Danh sách sinh viên</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    {{-- tenSV --}}
                    <div class="form-group">
                        <label for="">Tên sinh viên</label>
                        <input type="text" name="nameStudent" class="form-control" placeholder="Nhập tên sinh viên">
                    </div>
                    {{-- Tenbaihat --}}
                    <div class="form-group mt-4">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Nhập email">
                    </div>
                    {{-- Ngayviet --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">Ngày sinh</span>
                        <input type="date" class="form-control me-5" aria-label="DateOfBirth" aria-describedby="addon-wrapping" name="DateOfBirth">
                    </div>
                    {{-- MaTheLoai --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="inputGroupSelect01">Mã lớp</label>
                        <select class="form-select me-5" id="inputGroupSelect01" name="idGroup">
                            @foreach ($groups as $group)
                            <option value="{{$group->id}}">
                                {{$group->nameGroup}}
                            </option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-4">Lưu</button>
        </form>
    </div>
</div>
@endsection