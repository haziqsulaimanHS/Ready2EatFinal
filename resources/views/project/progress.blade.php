@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="mb-5"> {{ $project->name }} Progress Report</h1>

        <div class="card-body">
            <table class="table">

                <thead>
                <tr>
                    <th>No</th>
                    <th>Report ID</th>
                    <th>Date of Report</th>
                    <th>Status</th>
                    <th>Description</th>
                    @can('isLeadDeveloper')
                    <th>Action</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach ($progress as $entry)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{ $entry->ReportID }}</td>
                        <td>{{ $entry->Date_Report }}</td>
                        <td>{{ $entry->Status }}</td>
                        <td>{{ $entry->Description }}</td>
                        <td>
                            @can('isLeadDeveloper')
                            <form action="{{ route('project.deleteProgress', ['project' => $project->id, 'progress' => $entry->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    <tr>


                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        @can('isLeadDeveloper')

        <div class="container mt-5">
            <form method="POST" action="{{route('project.storeProgress', $project->id)}}">
                @csrf
                <div class="card mt-5">
                    <div class="card-header">Add New Progress</div>
                    <div class="card-body">
                        <div class="form-group  row mb-3">
                            <label for="ReportID" class="col-sm-2 col-form-label">Report ID</label>
                            <div class="col-sm-10">
                                <input type="text" name="ReportID" class="form-control" id="ReportID" required>
                                @error('ReportID')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group  row mb-3">
                            <label for="Date_Report" class="col-sm-2 col-form-label">Date Report</label>
                            <div class="col-sm-10">
                                <input type="date" name="Date_Report" class="form-control" id="Date_Report" required>
                                @error('Date_Report')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group  row mb-3">
                            <label for="Status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="Status" class="form-control" id="Status" required>
                                    <option value="" selected disabled>-- Please Select Status --</option>
                                    <option value="Ahead of Schedule">Ahead of Schedule</option>
                                    <option value="On Schedule">On Schedule</option>
                                    <option value="Delayed">Delayed</option>
                                    <option value="Completed">Completed</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group  row mb-3">
                            <label for="Description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea type="text" name="Description" class="form-control" id="Description"></textarea>
                                @error('Description')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        @endcan



                    </div>

                </div>
                <div class="text-center">
                    <a class="btn btn-warning " href="{{route('project.index')}}">Back</a>
                    @can('isLeadDeveloper')
                    <input class="btn btn-primary" type="submit" value="Submit">
                    @endcan
                </div>
            </form>
        </div>

    </div>
@endsection


