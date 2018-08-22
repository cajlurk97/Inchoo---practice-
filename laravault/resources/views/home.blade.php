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
                        <div class="col-md-8 offset-md-4">
                            <a class="btn btn-primary" href="{{ route('login') }}">
                                {{ __('Login') }}
                            </a>
                        </div>

                    <p><br>Have no acc?</p>
                        <div class="col-md-8 offset-md-4">
                            <a class="btn btn-primary" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        </div>

                </div>

            </div>


        @else

            <div class="row">
                <div class="col-lg-12 text-center">

                    <h1 class="mt-5">Welcome, {{Auth::user()->name}}</h1>

                    <div class="col-md-8 offset-md-4">
                        <a class="btn btn-primary" href="{{ route('login') }}">
                            {{ __('MyFiles') }}
                        </a>
                    </div>
                </div>
            </div>

        @endguest

    </div>

@endsection
