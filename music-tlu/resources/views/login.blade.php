@extends('layouts.base')

{{-- Trien khai title --}}
@section('title', 'Login')

@section('header')
    @include('layouts.header1')
@endsection


@section('main')
<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        @if (Session::has('info'))
            <div class="alert alert-success">
                {{ Session::get('info') }}
            </div>
        @endif
        <form class="p-3" action="{{route('users.login')}}" method="post" style="background-color: #838383; border-radius: 10px">
            {!! csrf_field() !!}
            <div class="d-flex align-items-center justify-content-between">
                <h4 class="text-white">Sign In</h4>
                <div class="d-icon" style="position: relative; top: -2.5rem;">
                    <a href="#"><i class="fa-brands fa-square-facebook text-warning" style="font-size: 56px"></i></a>
                    <a href="#"><i class="fa-brands fa-square-google-plus text-warning" style="font-size: 56px"></i></a>
                    <a href="#"><i class="fa-brands fa-square-twitter text-warning" style="font-size: 56px"></i></a>
                </div>
            </div>
            <div class="border-top border-bottom border-1 border-black p-3">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                    <input type="text" name="username" aria-label="username" aria-describedby="basic-addon1" class="form-control" placeholder="Username">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                    <input type="password" name="password" aria-label="password" aria-describedby="basic-addon1" class="form-control" placeholder="Password">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label text-white" for="exampleCheck1">Remember me</label>
                </div>
                <button type="submit" name="sbmLogin" class="btn btn-warning">Login</button>
            </div>
            <div class="form-bottom text-center">
                <p class="m-0">Don't have an account?<a class="text-decoration-none text-warning" href="{{route('users.signup')}}">Sign Up</a></p>
                <a href="" class="text-decoration-none text-warning">Forgot your password</a>
            </div>
        </form>
    </div>
    <div class="col-4"></div>
</div>
@endsection