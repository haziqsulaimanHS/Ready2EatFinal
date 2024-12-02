@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"><h1>Assign Project for {{ $project->name }}</h1></div>
            <div class="card-body">
                <table class="table">

                    <tr>

                    <tr>
                        <h5><strong>Lead Developer Assigned : </strong></h5>
                        <td>
                            <tr></tr>
                            <table class="table table-bordered">
                                @php($i=1)
                                <tr><th>No.</th><th>Developer ID</th><th>Name</th><th>Action</th></tr>
                                @foreach($project->leaddevelopers as $d)
                                    @if($i == 1)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$d->staffID}}</td>
                                            <td>{{$d->name}}</td>
                                            <td>
                                                <a href="{{ route('dropLeadDeveloper', ['project_id' => $project->id, 'developer_id' => $d->id]) }}" class="btn btn-danger">Drop</a>
                                            </td>
                                        </tr>
                                    @endif
                                    @php($i++)
                                @endforeach
                            </table>
                                <form action="{{ route('addToLeadDeveloper', $project->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="developers">Select Lead Developers:</label>
                                        <select name="developers" class="form-control">
                                            @foreach($allDevelopers as $developer)
                                                <option value="{{ $developer->id }}">{{ $developer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="text-center mt-3 mb-5">
                                    <button type="submit" class="btn btn-success">Add Lead Developers</button>
                                    </div>
                                </form>
                            </table>




                <h5><strong>Developers Assigned : </strong></h5>


                            <table class="table table-bordered">
                                @php($i=1)
                                <tr><th>No.</th><th>Developer ID</th><th>Name</th><th>Action</th></tr>
                                @foreach($project->developers as $d)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$d->staffID}}</td>
                                        <td>{{$d->name}}</td>
                                        <td>
                                            <a href="{{ route('dropDeveloper', ['project_id' => $project->id, 'developer_id' => $d->id]) }}" class="btn btn-danger">Drop</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>

                </table>


                <!-- Add Subjects Form -->
                <form action="{{ route('addToDeveloper', $project->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="developers">Select Developers:</label>
                        <select name="developers[]" class="form-control" multiple>
                            @foreach($allDevelopers as $developer)
                                <option value="{{ $developer->id }}">{{ $developer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-center mt-3 mb-5">

                    <button type="submit" class="btn btn-success">Add Developers</button>
                    <a class="btn btn-danger" href="{{route('dropAllDevelopers', $project->id)}}">Drop All</a>
                    </div>

                </form>

            </div>
        </div>
        <div class="text-center mt-3">
            <a class="btn btn-warning " href="{{route('project.index')}}">Back</a>
            <a class="btn btn-primary" href="{{route('project.edit',$project->id)}}">Edit Details</a>
        </div>
    </div>
@endsection
