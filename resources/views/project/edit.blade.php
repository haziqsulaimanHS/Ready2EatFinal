@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="{{route('project.update',$project)}}">
            @method('PATCH')
            @csrf
            <div class="card">
                <div class="card-header">Update Project Information</div>
                <div class="card-body">
                    <div class="form-group  row mb-3">
                        <label for="ProjectID" class="col-sm-2 col-form-label">Project ID</label>
                        <div class="col-sm-10">
                            <input  type="text" name="ProjectID" class="form-control" id="ProjectID" value="{{ $project->ProjectID }}">
                            @error('ProjectID')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="Title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="Title" class="form-control" id="Title" value="{{ $project->Title }}">
                            @error('Title')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="PIC" class="col-sm-2 col-form-label">Person in Charge</label>
                        <div class="col-sm-10">
                            <input type="text" name="PIC" class="form-control" id="PIC" value="{{ $project->PIC }}">
                            @error('PIC')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="Start_Date" class="col-sm-2 col-form-label">Start Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="Start_Date" class="form-control" id="Start_Date" value="{{ $project->Start_Date }}">
                            @error('Start_Date')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="End_Date" class="col-sm-2 col-form-label">End Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="End_Date" class="form-control" id="End_Date" value="{{ $project->End_Date }}">
                            @error('End_Date')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="Status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <input type="text" name="Status" class="form-control" id="Status" value="{{ $project->Status }}">
                            @error('Status')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="Methodology" class="col-sm-2 col-form-label">Methodology</label>
                        <div class="col-sm-10">
                            <input type="text" name="Methodology" class="form-control" id="Methodology" value="{{ $project->Methodology }}">
                            @error('Methodology')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="System_Platform" class="col-sm-2 col-form-label">System Platform</label>
                        <div class="col-sm-10">
                            <input type="text" name="System_Platform" class="form-control" id="System_Platform" value="{{ $project->System_Platform }}">
                            @error('System_Platform')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="Deployment_Type" class="col-sm-2 col-form-label">Deployment Type</label>
                        <div class="col-sm-10">
                            <input type="text" name="Deployment_Type" class="form-control" id="Deployment_Type" value="{{ $project->Deployment_Type }}">
                            @error('Deployment_Type')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>



                </div>
            </div>
            <div class="text-center mt-3">
                <a class="btn btn-warning " href="{{route('project.index')}}">Back</a>&nbsp;
                <input class="btn btn-secondary" type="reset" value="Reset"> &nbsp;
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>
    </div>
@endsection
