@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="{{route('developer.update',$developer)}}">
            @method('PATCH')
            @csrf
            <div class="card">
                <div class="card-header">Update Developer Information</div>
                <div class="card-body">
                    <div class="form-group  row mb-3">
                        <label for="BUID" class="col-sm-2 col-form-label">Developer ID</label>
                        <div class="col-sm-10">
                            <input  type="text" name="DevID" class="form-control" id="DevID" value="{{ $developer->DevID }}">
                            @error('DevID')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="Name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="Name" class="form-control" id="Name" value="{{ $developer->Name }}">
                            @error('Name')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="Email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="Email" class="form-control" id="Email" value="{{ $developer->Email }}">
                            @error('Email')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="PhoneNumber" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="text" name="PhoneNumber" class="form-control" id="PhoneNumber" value="{{ $developer->PhoneNumber }}">
                            @error('PhoneNumber')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <a class="btn btn-warning " href="{{route('developer.index')}}">Back</a>&nbsp;
                <input class="btn btn-secondary" type="reset" value="Reset"> &nbsp;
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>
    </div>
@endsection
