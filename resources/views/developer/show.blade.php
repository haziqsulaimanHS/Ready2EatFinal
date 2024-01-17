@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"><h1>Developer Details</h1></div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Developer ID</td>
                        <td>{{$developer->staffID}}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{{$developer->name}}</td>
                    </tr>

                    <tr>
                        <td>Department</td>
                        <td>{{$developer->department}}</td>
                    </tr>

                        <td>Projects assigned</td>
                        <td>
                            <table class="table table-bordered">
                                @php($i=1)
                                <tr><th>No.</th><th>Project ID</th><th>Project Name</th><th>Start Date</th></tr>
                                @foreach($developer->projects as $p)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$p->projectID}}</td>
                                            <td>{{$p->name}}</td>
                                            <td>{{$p->projectStartDate}}</td>
                                        </tr>
                                @endforeach
                            </table>

                        </td>
                    </tr>

                    <tr>
                        <td>Projects Lead</td>
                        <td>
                            <table class="table table-bordered">
                                @php($i=1)
                                <tr><th>No.</th><th>Project ID</th><th>Name</th><th>Start Date</th></tr>
                                @foreach($developer->leadprojects as $ld)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$ld->projectID}}</td>
                                            <td>{{$ld->name}}</td>
                                            <td>{{$ld->projectStartDate}}</td>
                                        </tr>
                                @endforeach
                            </table>

                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="text-center mt-3">
            <a class="btn btn-warning " href="{{route('developer.index')}}">Back</a>
            @can('isManager')
            <a class="btn btn-primary" href="{{route('developer.edit',$developer->id)}}">Edit Details</a>
            @endcan
        </div>
    </div>
@endsection
