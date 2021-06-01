@extends('template')

@section('content')
    <div class="row my-5">
      <div class="col-lg-12 margin-tb">
        <div class="float-left">
          <h2>Create New Major</h2>
        </div>
        <div class="float-right">
          <a href="{{route('majors.index')}}" class="btn btn-primary">Back</a>
        </div>
      </div>
    </div>

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

    <form action="{{route('majors.store')}}" method="POST">
      @csrf
      <div class="row">
        <div class="col-xl-12 col-md-12 col-sm-12">
          <div class="form-group">
            <strong>Major Name:</strong>
            <input type="text" name="major_name" class="form-control" placeholder="Major Name">
          </div>
        </div>
        <div class="col-xl-12 col-md-12 col-sm-12">
          <div class="form-group">
            <strong>Major Shortname:</strong>
            <input type="text" name="major_shortname" class="form-control" placeholder="Major Shorname">
          </div>
        </div>
        <div class="col-xl-12 col-md-12 col-sm-12">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
@endsection