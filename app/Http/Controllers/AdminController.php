<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\Department;
use App\Models\Admin;
use Session;


class AdminController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $employee = User::all();
       if(Session::has('loginId')){
        $data = User::where('user_id','=',Session::get('loginId'))->first();
       }

      

       $department=Department::getDepartment(1);
       
       $admin_id=Session::get('loginId');
       $admin_login=Session::get('admin');

    
       
       

       return view ('admin.index')->with('employee', $employee)->with('data',$data)->with('department',$department)->with('admin_id',$admin_id)->with('admin_login',$admin_login);
       
     
   }

   public function getAll(){
    $user = User::all();
    return $user;
  }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
   
    $department=Department::getDepartment(1);
    $admin_id=Session::get('loginId');
    return view ('admin.create')->with('department', $department)->with('admin_id',$admin_id);
  

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
       User::create($input);
     
    
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       $employee = User::find($id);
       return view('admin.show')->with('employee', $employee);
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $employee = User::find($id);
       $department=Department::getDepartment(1);
       return view('admin.edit')->with(compact('employee', 'department'));
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
       $employee = User::find($id);
       $input = $request->all();
       $employee->update($input);
       return redirect('admin')->with('flash_message', 'employee Updated!');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       User::destroy($id);
       return redirect('admin')->with('flash_message', 'employee deleted!');
   }

   public function getUser(){
    // $user = auth()->user();
    $list = new User();
    return response()->json($list);
}
}
