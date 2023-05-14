<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Admin;
use Session;
use App\Models\User;


class DepartmentController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $departments = Department::all();
       if(Session::has('loginId')){
        $data = User::where('user_id','=',Session::get('loginId'))->first();
       }
       $admin_login=Session::get('admin');

       return view ('departments.index')->with('departments', $departments)->with('data',$data)->with('admin_login',$admin_login);
   }

   public function getAll(){
     $departments = Department::all();
     return $departments;
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
    

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
       Department::create($input);
      
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       $employee = Department::find($id);
       return view('departments.show')->with('employee', $employee);
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $departments = Department::find($id);
       return view('departments.edit')->with('departments',$departments);
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
       $departments = Department::find($request->dep_id);
       $departments->dep_name=$request->dep_name;
    //    $input = $request->all();
    //    $departments->update($input);
        $departments->save();
    
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
    Department::destroy($id);
    return redirect('department')->with('flash_message', 'employee deleted!');  
   }
}
