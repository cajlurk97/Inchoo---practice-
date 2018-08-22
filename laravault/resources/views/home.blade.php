@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')

    <!-- Page Content -->
    <div class="container">

        @guest

            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="mt-5">Welcome</h1>
                    <p>Plesae, log in</p>
                    <a href="/login" class="button class btn-primary">Login</a>
                    <br>
                    <br>
                    <p>Or if you are new here</p>
                    <a href=/register" class="button class btn-primary">Register</a>
                </div>
            </div>


        @else

            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="mt-5">Welcome, {{Auth::user()->name}}</h1>
                    <button class="button class btn-primary">MyFiles</button>
                </div>
            </div>

        @endguest

    </div>

@endsection
