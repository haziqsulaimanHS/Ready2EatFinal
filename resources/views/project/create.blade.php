@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="{{route('project.store')}}">
            @csrf
            <div class="card mb-3">
                <div class="card-header">Add New Project</div>
                <div class="card-body">
                    <div class="form-group  row mb-3">
                        <label for="projectID" class="col-sm-2 col-form-label">Project ID</label>
                        <div class="col-sm-10">
                            <input type="text" name="projectID" class="form-control" id="projectID">
                            @error('projectID')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Project Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name">
                            @error('name')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="systemOwner" class="col-sm-2 col-form-label">System Owner</label>
                        <div class="col-sm-10">
                            <input type="text" name="systemOwner" class="form-control" id="systemOwner">
                            @error('systemOwner')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="systemPIC" class="col-sm-2 col-form-label">System PIC</label>
                        <div class="col-sm-10">
                            <input type="text" name="systemPIC" class="form-control" id="systemPIC">
                            @error('systemPIC')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="projectDuration" class="col-sm-2 col-form-label">Project Duration</label>
                        <div class="col-sm-10">
                            <input type="text" name="projectDuration" class="form-control" id="projectDuration">
                            @error('projectDuration')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="projectStatus" class="col-sm-2 col-form-label">Project Status</label>
                        <div class="col-sm-10">
                            <input type="text" name="projectStatus" class="form-control" id="projectStatus">
                            @error('projectStatus')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="projectStartDate" class="col-sm-2 col-form-label">Project Start Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="projectStartDate" class="form-control" id="projectStartDate">
                            @error('projectStartDate')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="projectEndDate" class="col-sm-2 col-form-label">Project End Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="projectEndDate" class="form-control" id="projectEndDate">
                            @error('projectEndDate')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="developmentMethodology" class="col-sm-2 col-form-label">Development Methodology</label>
                        <div class="col-sm-10">
                            <select name="developmentMethodology" class="form-control" id="developmentMethodology">
                                <option value="" selected disabled>-- Please Select Development Methodology --</option>
                                <option value="Agile">Agile</option>
                                <option value="Waterfall">Waterfall</option>
                            </select>
                            @error('developmentMethodology')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="systemPlatform" class="col-sm-2 col-form-label">System Platform</label>
                        <div class="col-sm-10">
                            <select name="systemPlatform" class="form-control" id="systemPlatform">
                                <option value="" selected disabled>-- Please Select System Platform --</option>
                                <option value="Web-based">Web-based</option>
                                <option value="Mobile">Mobile</option>
                                <option value="Stand-alone system">Stand-alone system</option>
                            </select>
                            @error('systemPlatform')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="projectDeploymentType" class="col-sm-2 col-form-label">Project Deployment Type</label>
                        <div class="col-sm-10">
                            <select name="projectDeploymentType" class="form-control" id="projectDeploymentType">
                                <option value="" selected disabled>-- Please Select Deployment Type --</option>
                                <option value="Cloud">Cloud</option>
                                <option value="On-premises">On-premises</option>
                            </select>
                            @error('projectDeploymentType')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
            <div class="text-center">
                <a class="btn btn-warning " href="{{route('project.index')}}">Back</a>
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>
    </div>
@endsection




