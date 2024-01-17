@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Progress for Project: {{ $project->Title }}</h1>

        <form method="POST" action="{{ route('project.updateProgress', ['project' => $project->id, 'progress' => $progress->id]) }}">
            @csrf
            @method('PATCH')

            <div class="card mb-3">
                <div class="card-header">Edit Progress Entry</div>
                <div class="card-body">
                    <div class="form-group row mb-3">
                        <label for="ReportID" class="col-sm-2 col-form-label">Report ID</label>
                        <div class="col-sm-10">
                            <input type="text" name="ReportID" class="form-control" id="ReportID" value="{{ $entry->ReportID }}" required>
                            @error('ReportID')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="Date_Report" class="col-sm-2 col-form-label">Date Report</label>
                        <div class="col-sm-10">
                            <input type="date" name="Date_Report" class="form-control" id="Date_Report" value="{{ $entry->Date_Report }}" required>
                            @error('Date_Report')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="Status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select name="Status" class="form-control" id="Status" required>
                                <option value="Ahead of Schedule" {{ $entry->Status === 'Ahead of Schedule' ? 'selected' : '' }}>Ahead of Schedule</option>
                                <option value="On Schedule" {{ $entry->Status === 'On Schedule' ? 'selected' : '' }}>On Schedule</option>
                                <option value="Delayed" {{ $entry->Status === 'Delayed' ? 'selected' : '' }}>Delayed</option>
                                <option value="Completed" {{ $entry->Status === 'Completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="Description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea type="text" name="Description" class="form-control" id="Description">{{ $entry->Description }}</textarea>
                            @error('Description')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <a class="btn btn-warning" href="{{ route('project.index') }}">Back</a>
                <input class="btn btn-primary" type="submit" value="Update">
            </div>
        </form>
    </div>
@endsection


