@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"><h1>Request System Details</h1></div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>System Name</td>
                        <td>{{$bu->newSystem}}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{$bu->description}}</td>
                    </tr>


                </table>
            </div>
        </div>
        <div class="text-center mt-3">
            <a class="btn btn-warning " href="{{route('bu.index')}}">Back</a>
            @can('isBuUnit')
            <a class="btn btn-primary" href="{{route('bu.edit',$bu->id)}}">Edit Details</a>
            @endcan
        </div>
    </div>
@endsection
