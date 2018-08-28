@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload file</div>

                    <div class="card-body">

                        <form enctype="multipart/form-data" action="{{ route('fileUpload')}}" method="POST">
                            @csrf

                                <input type="file" class="form-control-file" name="file">
                                <br>
                                <input type="radio" name="privacy" value=1> Public<br><br>
                                <input type="radio" name="privacy" value=0 checked="checked"> Private<br><br>
                                <input type="submit" value="Upload">

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

