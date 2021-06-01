@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Student</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('students.index') }}">Back</a>
            </div>
        </div>
    </div>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif 
    <form action="{{ route('students.update',$student->id) }}" method="POST">
        @csrf
        @method('PUT')
 
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $student->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NPM:</strong>
                    <input type="number" name="npm" value="{{ $student->npm }}" class="form-control" placeholder="NPM">
                </div>
            </div>
            <div class="col-xl-12 col-md-12 col-sm-12">
              <div class="form-group">
                <strong>Major:</strong>
                <select class="form-select form-control" name="major_id">
                  @foreach ($majors as $major)
                  <option value="{{ $major->id }}"  {{ $student->major_id == $major->id ? 'selected="selected"' : '' }}>{{ $major->major_name }}</option>
                      {{-- <option value="{{$major->id}}">{{$major->major_name}}</option> --}}
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
 
    </form>
@endsection