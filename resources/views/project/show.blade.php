@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"><h1>Project Details</h1></div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Project ID</td>
                        <td>{{$project->projectID}}</td>
                    </tr>
                    <tr>
                        <td>Project Name</td>
                        <td>{{$project->name}}</td>
                    </tr>
                    <tr>
                        <td>System Owner</td>
                        <td>{{$project->systemOwner}}</td>
                    </tr>


                    <tr>
                        <td>System Person in Charge</td>
                        <td>{{$project->systemPIC}}</td>
                    </tr>
                    <tr>
                        <td>Project Duration</td>
                        <td>{{$project->projectDuration}}</td>
                    </tr>
                    <tr>
                        <td>Project Status</td>
                        <td>{{$project->projectStatus}}</td>
                    </tr>
                    <tr>
                        <td>Start Date</td>
                        <td>{{$project->projectStartDate}}</td>
                    </tr>
                    <tr>
                        <td>End Date</td>
                        <td>{{$project->projectEndDate}}</td>
                    </tr>
                    <tr>
                        <td>Development Methodology</td>
                        <td>{{$project->developmentMethodology}}</td>
                    </tr>
                    <tr>
                        <td>System Platform</td>
                        <td>{{$project->systemPlatform}}</td>
                    </tr>
                    <tr>
                        <td>Deployment Type</td>
                        <td>{{$project->projectDeploymentType}}</td>
                    </tr>
                    <tr>

                    <tr>
                        <td>Lead Developer</td>
                        <td>
                            <table class="table table-bordered">
                                @php($i=1)
                                <tr><th>No.</th><th>Developer ID</th><th>Name</th></tr>
                                @foreach($project->leaddevelopers as $d)
                                    @if($i == 1)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$d->staffID}}</td>
                                            <td>{{$d->name}}</td>

                                        </tr>
                                    @endif
                                    @php($i++)
                                @endforeach

                            </table>

                        </td>
                    </tr>

                    <tr>
                        <td>Developers Assigned</td>
                        <td>
                            <table class="table table-bordered">
                                @php($i=1)
                                <tr><th>No.</th><th>Developer ID</th><th>Name</th></tr>
                                @foreach($project->developers as $d)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$d->staffID}}</td>
                                        <td>{{$d->name}}</td>

                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                </table>




            </div>
        </div>
        <div class="text-center mt-3">
            <a class="btn btn-warning " href="{{route('project.index')}}">Back</a>
            @can('isManager')
            <a class="btn btn-primary" href="{{route('project.edit',$project->id)}}">Edit Details</a>
            @endcan
        </div>
    </div>
@endsection
