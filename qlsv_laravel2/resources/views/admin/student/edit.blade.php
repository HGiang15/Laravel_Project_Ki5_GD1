@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Sửa sinh viên')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Sửa sinh viên</h3>       
            </div>
            <div class="col-md-6">
                <a href="{{ route('students.index') }}" class="btn btn-primary float-end">Danh sách sinh viên</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    {{-- MSV --}}
                    <div class="form-group">
                        <label for="">Mã sinh viênt</label>
                        <input type="text" name="id" class="form-control bg-warning" value="{{ $student->id }}" readonly>
                    </div>
                    {{-- tenSV --}}
                    <div class="form-group">
                        <label for="">Tên sinh viên</label>
                        <input type="text" name="nameStudent" class="form-control" value="{{ $student->nameStudent }}">
                    </div>
                    {{-- email --}}
                    <div class="form-group mt-4">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ $student->email }}">
                    </div>
                    {{-- NS --}}
                    <div class="form-group mt-4">
                        <span class="input-group-text" id="addon-wrapping">Ngày sinh</span>
                        <input type="date" class="form-control me-5" aria-label="DateOfBirth" aria-describedby="addon-wrapping" name="DateOfBirth" value="{{ $student->DateOfBirth }}">
                    </div>
                    {{-- MaTheLoai --}}
                    <div class="form-group mt-4">
                        <label class="input-group-text" for="inputGroupSelect01">Mã lớp</label>
                        <select class="form-select me-5" id="inputGroupSelect01" name="idGroup">
                            @foreach ($groups as $group)
                            @if($group->id == $student->idGroup)
                                <option value="{{$group->id}}" selected>
                                    {{$group->id}}
                                </option>
                            @else
                                <option value="{{$group->id}}">
                                    {{$group->id}}
                                </option>
                            @endif
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