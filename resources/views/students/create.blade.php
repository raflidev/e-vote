@extends('template')

@section('content')
    <div class="row my-5">
      <div class="col-lg-12 margin-tb">
        <div class="float-left">
          <h2>Create New Student</h2>
        </div>
        <div class="float-right">
          <a href="{{route('students.index')}}" class="btn btn-primary">Back</a>
        </div>
      </div>
    </div>
    {{-- {{dd($majors)}} --}}
    @if ($errors->any())
        <div class="alert alert-danger">
          <strong>Whoops!</strong> there were some problems with
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
    @endif

    <form action="{{route('students.store')}}" method="POST">
      @csrf
      <div class="row">
        <div class="col-xl-12 col-md-12 col-sm-12">
          <div class="form-group">
            <strong>Name:</strong>
            <input type="text" name="name" class="form-control" placeholder="Name">
          </div>
        </div>
        <div class="col-xl-12 col-md-12 col-sm-12">
          <div class="form-group">
            <strong>NPM:</strong>
            <input type="number" name="npm" class="form-control" placeholder="NPM">
          </div>
        </div>
        <div class="col-xl-12 col-md-12 col-sm-12">
          <div class="form-group">
            <strong>Major:</strong>
            <select class="form-select form-control" name="major_id">
              <option selected>Open this select major</option>
              @foreach ($majors as $major)
                  <option value="{{$major->id}}">{{$major->major_name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-xl-12 col-md-12 col-sm-12">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
@endsection