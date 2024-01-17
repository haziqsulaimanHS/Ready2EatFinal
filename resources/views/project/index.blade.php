@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('success'))
            <h6 class="alert alert-success">
                {{ session('success') }}
            </h6>
        @endif
        <div class="card-header">
            <h1>List of Projects</h1>
        </div>
        <div class="card-body">
            @can('isManager')
            <a class="btn btn-primary float-end" href="{{route('project.create')}}">Add New Project</a>
            @endcan
            <table class="table">
                <thead>
                <tr><th>No.</th><th>Project ID</th><th>Project Name</th><th>Project Start Date</th><th>Action</th></tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($projects as $p)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$p->projectID}}</td>
                        <td>{{$p->name}}</td>
                        <td>{{$p->projectStartDate}}</td>
                        <td>
                            <form action="{{route('project.destroy',$p)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info" href="{{route('project.show',$p->id)}}">Details</a>
                                @can('isManager')
                                <a class="btn btn-warning" href="{{route('project.edit',$p->id)}}">Edit</a>
                                @endcan
                                <a class="btn btn-outline-primary" href="{{route('project.progress',$p->id)}}">Progress Report</a>
                                @can('isManager')
                                <a class="btn btn-success" href="{{route('project.assign',$p->id)}}">Assign Project</a>
                                <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Confirm DELETE?')">
                                @endcan
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
