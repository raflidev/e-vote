@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Student Management</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('students.create') }}">Create Student</a>
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
            <th>Name</th>
            <th>NPM</th>
            <th>Major</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        {{-- {{dd($students)}} --}}
        @foreach ($students as $student)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->npm }}</td>
            <td>{{ $student->major_name }}</td>
            <td class="text-center">
                <form action="{{ route('students.destroy',$student->id) }}" method="POST">
 
                    <a class="btn btn-info btn-sm" href="{{ route('students.show',$student->id) }}">Show</a>
 
                    <a class="btn btn-primary btn-sm" href="{{ route('students.edit',$student->id) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{-- {!! $students->links() !!} --}}
 
@endsection