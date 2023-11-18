@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Thêm lớp học')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Thêm mới lớp học</h3>
            </div>
            <div class="col-md-6">
                <a href="{{ route('groups.index') }}" class="btn btn-primary float-end">Danh sách lớp học</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('groups.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    {{-- TenLop --}}
                    <div class="form-group">
                        <label for="">Tên lớp</label>
                        <input type="text" name="nameGroup" class="form-control" placeholder="Nhập tên lớp học">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-4">Lưu</button>
        </form>
    </div>
</div>
@endsection