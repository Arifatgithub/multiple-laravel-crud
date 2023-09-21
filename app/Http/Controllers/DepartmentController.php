<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use PhpParser\Node\Stmt\TryCatch;
use App\Models\Department;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::paginate('5');
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        try {
            $departments = Department::create($request->inputs());
            if ($departments) {
                successResponse('Department added');
                return redirect()->route('departments.index');
            }else {
                errorResponse('Try again');
                return redirect()->route('departments.create');
            }


        } catch (\Exception $th) {
            errorResponse($th->getMessage());
            return redirect()->route('departments.create');
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
        $departments = Department::find($id);
        return view('departments.edit',compact('departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $departments = Department::find($id);
            if (!$departments) {
                return redirect()->route('departments.create')->with('id not found');
            }
            $departments->name = $request->input('name');
            $departments->code = $request->input('code');
            $departments->status = $request->input('status');
            $departments->save();
            successResponse('Department updated');
            return redirect()->route('departments.index');

        } catch (\Exception $th) {
            errorResponse($th->getMessage());
        return redirect()->route('departments.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $departments = Department::findOrFail($id);
            $departments->delete();
            if(!$departments){
                return redirect()->route('departments.index')->with('try again');
            }
            successResponse('Department deleted');
            return redirect()->route('departments.index');

        } catch (\Exception $th) {
            errorResponse($th->getMessage());
        return redirect()->route('departments.index');
        }
    }
}
