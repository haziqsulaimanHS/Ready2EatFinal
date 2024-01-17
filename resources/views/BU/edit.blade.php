@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="{{route('bu.update',$bu)}}">
            @method('PATCH')
            @csrf
            <div class="card">
                <div class="card-header">Update Request System Information</div>
                <div class="card-body">
                    <div class="form-group  row mb-3">
                        <label for="newSystem" class="col-sm-2 col-form-label">System Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="newSystem" class="form-control" id="newSystem">
                            @error('newSystem')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" class="form-control" id="description">
                            @error('description')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <a class="btn btn-warning " href="{{route('bu.index')}}">Back</a>&nbsp;
                <input class="btn btn-secondary" type="reset" value="Reset"> &nbsp;
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>
    </div>
@endsection
