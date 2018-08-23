@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')

    <div class="row">

        <div class="col-lg-12 text-center">

            <a class="btn btn-primary" href="{{ route('fileUpload') }}">File upload</a>

            <a class="btn btn-primary" href="{{ route('folderUpload') }}">Folder upload</a>

        </div>

    <div class="container">
        <div class="col-lg-12 text-center">
            <table class="table-light">
                <tr>
                    <th>File name</th>
                    <th>Privacy</th>
                    <th>Download Counter</th>
                </tr>
                <tr>
                    <br>
                </tr>
            </table>
        </div>
    </div>


@endsection

