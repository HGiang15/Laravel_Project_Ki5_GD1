@extends('layouts.base')

{{-- Triển khai title --}}
@section('title', 'Sửa lớp học')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Sửa lớp học</h3>
            </div>
            <div class="col-md-6">
                <a href="{{ route('groups.index') }}" class="btn btn-primary float-end">Danh sách lớp học</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('groups.update', $group->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    {{-- MTL --}}
                    <div class="form-group">
                        <label for="">Mã lớp</label>
                        <input type="text" name="id" class="form-control bg-warning" value="{{ $group->id }}" readonly>
                    </div>
                    {{-- TenTL --}}
                    <div class="form-group">
                        <label for="">Tên lớp</label>
                        <input type="text" name="nameGroup" class="form-control" value="{{$group->nameGroup}}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-4">Lưu</button>
        </form>
    </div>
</div>
@endsection