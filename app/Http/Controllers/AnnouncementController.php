<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
class AnnouncementController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::all();
        return view ('announcements.index')->with('announcements', $announcements);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'anns_title' => 'required',
            'anns_desc' => 'required',
            'file' => 'nullable|file|max:10240',
        ]);
    
        $announcement = new Announcement();
        $announcement->anns_title = $validatedData['anns_title'];
        $announcement->anns_desc = $validatedData['anns_desc'];
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $announcement->file = $filename;
        }
    
        $announcement->save();
        return redirect('announcement')->with('flash_message', 'announcement Addedd!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $announcement = Announcement::find($id);
        return view('announcements.show')->with('announcements', $announcement);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $announcement = Announcement::find($id);
        return view('announcements.edit')->with('announcements', $announcement);
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
        $announcement = Announcement::find($id);
        $input = $request->all();
        $announcement->update($input);
        return redirect('announcement')->with('flash_message', 'announcement Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        announcement::destroy($id);
        return redirect('announcement')->with('flash_message', 'announcement deleted!');
    }

    public function getAnnouncement(){
        // if($user->user_id == $task->user_id){
            $list = new Announcement();
            $list = $list->getAnnouncement();
            return response()->json($list);
            // }
    }
}
