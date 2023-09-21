<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;
use PhpParser\Node\Stmt\If_;
use PhpParser\Node\Stmt\TryCatch;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $newStudents =[];
        // $students = Student::get();

        // foreach($students as $student){
        //     $departmentId = $student->department_id;
        //     $department = Department::where('id', $departmentId)->first();
        //     //echo $student->first_name.' ';
        //     //echo $department->title.'<br>';
        //     $arr = ['student' => $student, 'department' => $department];
        //     $newStudents[] = $arr;
        // }

        // return $newStudents[0];


        $students = Student::with('department')->paginate(10);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        try {
            $student = new Student();
            $student->first_name = $request->first_name;
            $student->last_name = $request->last_name;
            $student->email = $request->email;
            $student->address = $request->address;
            $student->department_id = $request->department_id;
            if ($student->save()) {
                session()->flash('success_message', 'Student information added successfully');
                return redirect()->route('students.index');
            }
            session()->flash('error_message', 'Something went wrong, please try again');
            return redirect()->route('students.create');


        } catch (\Exception $th) {
            session()->flash('error_message',$th->getMessage());
            return redirect()->route('students.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);
        return view('students.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return redirect()->route('students.edit')->with('id not fount');
        }
        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->email = $request->input('email');
        $student->address = $request->input('address');
        $student->department_id = $request->input('department_id');
        if ($student->save()) {
            session()->flash('success_message', 'Student information updated successfully');
            return redirect()->route('students.index');
        } else {
            # code...
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        if ($student) {
            session()->flash('error_message', 'Student information deleted successfully');
            return redirect()->route('students.index');
        } else {
            # code...
        }

    }
}
