@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Major Management</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('majors.create') }}">Create Major</a>
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
 
    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Major Name</th>
            <th>Shortname</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($majors as $major)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $major->major_name }}</td>
            <td>{{ $major->major_shortname }}</td>
            <td class="text-center">
                <form action="{{ route('majors.destroy',$major->id) }}" method="POST">
 
                    <a class="btn btn-info btn-sm" href="{{ route('majors.show',$major->id) }}">Show</a>
 
                    <a class="btn btn-primary btn-sm" href="{{ route('majors.edit',$major->id) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $majors->links() !!}
 
@endsection