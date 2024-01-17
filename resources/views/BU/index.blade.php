@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('success'))
            <h6 class="alert alert-success">
                {{ session('success') }}
            </h6>
        @endif
        <div class="card-header">
            <h1>List of Requested System</h1>
        </div>
        <div class="card-body">
            @can('isBuUnit')
            <a class="btn btn-primary float-end" href="{{route('bu.create')}}">Add New System</a>
            @endcan
            <table class="table">
                <thead>
                <tr><th>No.</th><th>System Name</th><th>Action</th></tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($bus as $b)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$b->newSystem}}</td>
                        <td>
                            <form action="{{route('bu.destroy',$b)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info" href="{{route('bu.show',$b->id)}}">Details</a>
                                @can('isBuUnit')
                                <a class="btn btn-warning" href="{{route('bu.edit',$b->id)}}">Edit</a>
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
