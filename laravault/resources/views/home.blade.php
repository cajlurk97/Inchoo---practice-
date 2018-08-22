@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')

    <!-- Page Content -->
    <div class="container">


        @if(!$user['logedin'])
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="mt-5">Welcome</h1>
                </div>
            </div>

            <form action="/login/login">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter username">
                    <small class="form-text text-muted">We'll never share your email with anyone
                        else.
                    </small>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>

        @endif


        @if($user['logedin'])

            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="mt-5">Welcome, {{$user['name']}}</h1>
                </div>
            </div>

        @endif


    </div>

@endsection
