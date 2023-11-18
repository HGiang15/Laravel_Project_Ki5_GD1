@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Signup')

@section('header')
    @include('layouts.header1')
@endsection




@section('main')
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <form action="{{route('users.store')}}" method="post" name="loginForm">
            {!! csrf_field() !!}
            <h3 class="text-center fw-bold">ĐĂNG KÝ NGƯỜI DÙNG MỚI</h3>
            <div class="d-icon mb-3 text-center">
                <a href="#"><i class="fa-brands fa-square-facebook text-warning" style="font-size: 56px"></i></a>
                <a href="#"><i class="fa-brands fa-square-google-plus text-warning" style="font-size: 56px"></i></a>
                <a href="#"><i class="fa-brands fa-square-twitter text-warning" style="font-size: 56px"></i></a>
            </div>
            <!-- Username -->
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Tên người dùng</span>
                <input type="text" class="form-control" aria-label="user" aria-describedby="addon-wrapping" name="username" id="username">
            </div>
            <!-- Email -->
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Email</span>
                <input type="email" class="form-control" aria-label="email" aria-describedby="addon-wrapping" name="email">
            </div>
            <!-- Role -->
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Role</label>
                <select class="form-select" id="inputGroupSelect01" name="role">
                    <option value="user" selected>user</option>
                    <option value="admin">admin</option>
                    <option value="author">author</option>
                </select>
            </div>
            <!-- Status -->
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Status</label>
                <select class="form-select" id="inputGroupSelect01" name="status">
                    <option value="inactive" selected>inactive</option>
                    <option value="active">active</option>
                </select>
            </div>
            <!-- Pass 1 -->
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Password</span>
                <input type="password" class="form-control" aria-label="password1" aria-describedby="addon-wrapping" name="password1">
            </div>
            <!-- Pass 2 -->
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Re-type Password</span>
                <input type="password" class="form-control" aria-label="password2" aria-describedby="addon-wrapping" name="password2">
            </div>

            <!-- Button -->
            <div class="gap-2 d-md-flex justify-content-md-end">
                <button type="submit" name="sbmSave" class="btn btn-success px-4">Thêm</button>
                <a href="{{route('users.index')}}">
                    <button type="button" class="btn btn-warning px-4">Quay lại</button>
                </a>
            </div>
        </form>
    </div>
    <div class="col-2"></div>
</div>
@endsection