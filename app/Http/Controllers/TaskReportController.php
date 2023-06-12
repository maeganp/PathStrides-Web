<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskReport;
use Session;
use App\Models\User;
use App\Models\Admin;
class TaskReportController extends Controller
{
    public function index()
    {
        $taskreport = TaskReport::all();
        $admin_login=Session::get('admin');

        if(Session::has('loginId')){
            $data = User::where('user_id','=',Session::get('loginId'))->first();
           }

         if(Session::has('loginId')){
            $data2 = Admin::where('admin_id','=',Session::get('loginId'))->first();

        }


        return view ('taskreport.index')->with('taskreport', $taskreport)->with('admin_login',$admin_login)->with('data',$data)->with('data2',$data2);
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
        TaskReport::create($input);
        return redirect('taskreport')->with('flash_message', 'taskreport Addedd!'); 
     
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $taskreport = TaskReport::find($id);
        return view('taskreport.show')->with('taskreport', $taskreport);
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taskreport = TaskReport::find($id);
        $department=Department::getDepartment(1);
        return view('taskreport.edit')->with(compact('taskreport', 'department'));
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
        $taskreport = TaskReport::find($id);
        $input = $request->all();
        $taskreport->update($input);
        return redirect('taskreport')->with('flash_message', 'taskreport Updated!');
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TaskReport::destroy($id);
        return redirect('taskreport')->with('flash_message', 'taskreport deleted!');
    }

    public function uploadImage(Request $request){
        $dir="test/";
        $image = $request->file('image');
     
       if ($request->has('image')) {
               $imageName = \Carbon\Carbon::now()->toDateString() . "-" . uniqid() . "." . "png";
               if (!Storage::disk('public')->exists($dir)) {
                   Storage::disk('public')->makeDirectory($dir);
                   
               }
               Storage::disk('public')->put($dir.$imageName, file_get_contents($image));
       }else{
            return response()->json(['message' => trans('/storage/test/'.'def.png')], 200);
       } 


       $userDetails = [
       
           'image' => $imageName,
        
       ];


       return response()->json(['message' => trans('/storage/test/'.$imageName)], 200);
        // $image = $_FILES['image']['name'];
        // $name = $_POST['name'];
    
        // $imagePath = 'upload/'.$image;
        // $tmp_name = $_FILES['image']['tmp_name'];

        // move_uploaded_file($tmp_name,$imagePath);

        // $taskreport->query("INSERT INTO pathstrides.task_report(name,image)VALUES('".$name."','".$image."')");

        // if($request){
        //     echo json_encode([
        //         'message' => 'Data input successfully'
        //     ]);
        // }else{
        //     echo json_encode([
        //         'message' => 'Data Failed to input'
        //     ]);
        
        // }
        // return response()->json($response, 200);


    }

    public function showImage($id)
    {
        $query=TaskReport::where('task_report_id', $id)->first();
        
       
        $imagePath =  $query->report_image_url;
    }
    public function getTaskReport(){
        // if($auth_id == $emp_id){
            $list = new TaskReport();
            $list = $list->getTaskReport();
            return response()->json($list);
            // }
    // }
}
}
