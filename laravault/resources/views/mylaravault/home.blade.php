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

            <div class="card-body" align="right">
                <label>View public files</label>
                <a class="btn btn-primary" href="{{ route('publicFiles') }}">Shared files</a>
            </div>

            <div class="card-body">

                <div class="row">
                    <table class="table table-striped">
                        <thead class=".thead-dark">
                        <tr>
                            <th>#</th>
                            <th>File name</th>
                            <th>Privacy</th>
                            <th>Owner</th>
                            <th>Download Counter</th>
                            <th>Download</th>
                        </tr>
                        </thead>


                        @foreach($files as $key=>$file)

                            <tr>
                                <td>{{$key + 1 }}</td>

                                <td>{{ $file['name'] }}</td>

                                <td>
                                    @if( $file['public'] == 1)
                                        Public
                                    @else
                                        Private
                                    @endif

                                </td>

                                <td>
                                    @if($file['ownerid'] == \Auth::user()->id)
                                        Me
                                    @else
                                        {{ $file['ownerfullname'] }}
                                    @endif
                                </td>

                                <td align="center">{{$file['downloadcount'] }}</td>

                                <td><a href="{{  route('fileDownload') . '?fileid='}} {{ $file['id'] }}">Download</a>
                                </td>

                            </tr>
                        @endforeach


                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection

