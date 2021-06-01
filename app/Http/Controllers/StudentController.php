<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Major;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $students = Student::latest()->paginate(5)->join('majors', 'majors.id', '=', 'students.major_id');
        $students = Student::join('majors', 'majors.id', '=', 'students.major_id')->latest()
            ->paginate(5, array('students.*', 'majors.major_name as major_name'));

        return view('students.index', compact('students'))
            ->with('i', (request()->input('page',1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majors = Major::all();
        return view('students.create', compact('majors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'major_id' => 'required',
            'name' => 'required',
            'npm' => 'required'
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Major created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $majors = Major::all();
        return view('students.edit', compact('student', 'majors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Student $student)
    {
        $request->validate([
            'name' => 'required',
            'npm' => 'required',
            'major_id' => 'required'
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Major update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        
        return redirect()->route('students.index')
            ->with('success', 'Major delete successfully');
    }
}
