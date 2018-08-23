@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')



    <div class="container">
        <div class="col-lg-12 text-center">

            <div class="row">

                <div class="col-lg-12 text-center">

                    <a class="btn btn-primary" href="{{ route('fileUploadForm') }}">File upload</a>

                    <a class="btn btn-primary" href="{{ route('folderUploadForm') }}">Folder upload</a>

                </div>
            </div>
            <br>
            <div class="card-body">

                <div class="row">
                    <table class="table table-striped">
                        <thead class=".thead-dark">
                        <tr>
                            <th>#</th>
                            <th>File name</th>
                            <th>Privacy</th>
                            <th>Download Counter</th>
                        </tr>
                        </thead>


                        @foreach($files as $key=>$file)

                            <tr>
                                <td>{{$key + 1 }}</td>
                                <td>{{ $file->{'name'} }}</td>
                                <td>
                                    @if( $file->{'public'} == 1)
                                        Public
                                    @else
                                        Private
                                    @endif

                                </td>
                                <td>{{$file->{'downloadcount'} }}</td>
                                <td><a href="dir/download?filename={{ $file->{'name'} }}">Download</a></td>
                            </tr>
                        @endforeach


                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection

