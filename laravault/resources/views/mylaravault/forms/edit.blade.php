@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')

    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Edit {{" \""}}{{$file['name']}}.{{$file['ext']}}{{"\""}}</div>

                    <div class="card-body">

                        <form enctype="multipart/form-data" action="{{ route('fileEdit')}}{{'?fileid='}}{{$file['id']}}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Filename</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" name="filename" value="{{$file['name']}}">
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-6 text-md-right">
                                    <input type="radio" name="privacy" value=1> Public
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 text-md-right">
                                    <input type="radio" name="privacy" value=0 checked="checked"> Private
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 text-md-right">
                                    <input type="submit" value="Update">
                                </div>
                            </div>

                        </form>

                    </div>


                </div>
                <br>
                <div class="card">
                    <div class="card-header"> Delete {{" \""}}{{$file['name']}}.{{$file['ext']}} {{"\""}}</div>
                    <div class="card-body">
                    <a class="btn btn-danger" href="{{route('fileDelete') . '?fileid='}}{{$file['id']}}">Delete File</a>
                </div>
            </div>
        </div>

    </div>

    </div>



@endsection

