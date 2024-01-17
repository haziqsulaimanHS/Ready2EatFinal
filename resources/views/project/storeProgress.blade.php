@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="card-header">
            <h1>Progress for Project: {{ $project->name }}</h1>
        </div>

        <div class="card-body">
            <a class="btn btn-primary float-end" href="{{ route('project.storeProgress', ['project' => $project->id]) }}">Add New Progress Report</a>
            <table class="table">
                <thead>
                <tr>
                    <th>Report ID</th>
                    <th>Date of Report</th>
                    <th>Status</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($progress->sortByDesc('Date_Report') as $entry)
                    <tr>
                        <td>{{ $entry->ReportID }}</td>
                        <td>{{ $entry->Date_Report }}</td>
                        <td>{{ $entry->Status }}</td>
                        <td>{{ $entry->Description }}</td>
                        <td>
                            <form action="{{ route('project.deleteProgress', ['project' => $project->id, 'progress' => $entry->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>



    </div>
@endsection
