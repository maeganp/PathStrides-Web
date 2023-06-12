<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Facades\Validator;

use Session;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has('loginId')){
        $data = User::where('user_id','=',Session::get('loginId'))->first();
        $employees=User::where('role','=','2');
        return view ('employees.index')->with('employees', $employees);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department=Department::getDepartment(1);
        $manager=User::getManager(1);
        return view('employees.create')->with(compact('department','manager'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $employee = Employee::create($input);
        $token = $employee->createToken('Personal Access Token')->plainTextToken;
        $response = ['employee'=> $employee,'token'=> $token];
        
        return redirect('employee')->with('flash_message', 'Employee Addedd!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employees.show')->with('employees', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department=Department::getDepartment(1);
        $manager=Manager::getManager(1);
        $employees = Employee::find($id);
        return view('employees.edit')->with(compact('employees','department','manager'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        $input = $request->all();
        $employee->update($input);
        return redirect('employee')->with('flash_message', 'employee Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect('employee')->with('flash_message', 'employee deleted!');
    }

    public function uploadImage(Request $request)
    {
        // Retrieve the image file from the request
        $image = $request->file('image');
        
     
        // // Save the image file to the server
        $path = Storage::putFile('images', $image);

        // // Return a response with the path to the saved image file
         return response()->json(['path' => $path]);
    }
}
