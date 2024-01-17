@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="{{route('bu.store')}}">
            @csrf
            <div class="card mb-3">
                <div class="card-header">Request New System</div>
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
            <div class="text-center">
                <a class="btn btn-warning " href="{{route('bu.index')}}">Back</a>
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>
    </div>
@endsection
