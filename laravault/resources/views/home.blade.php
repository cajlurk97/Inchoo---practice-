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

                    <a class="btn btn-primary" href="{{ route('login') }}">Login</a>


                    <p><br>Have no acc?</p>

                    <a class="btn btn-primary" href="{{ route('register') }}">Register</a>


                </div>

            </div>


        @else

            <div class="row">
                <div class="col-lg-12 text-center">

                    <h1 class="mt-5">Welcome, {{Auth::user()->name}}</h1>

                    <a class="btn btn-primary" href="{{ route('mylaravault') }}">MyFiles</a>

                </div>
            </div>

        @endguest

    </div>

@endsection
