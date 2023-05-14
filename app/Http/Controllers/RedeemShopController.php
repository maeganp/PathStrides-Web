<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Session;
use App\Models\User;
class RedeemShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Shop::all();
        if(Session::has('loginId')){
            $data = User::where('user_id','=',Session::get('loginId'))->first();
           }
           $admin_login=Session::get('admin');
        return view ('pointshop.index')->with('product', $product)->with('data',$data)->with('admin_login',$admin_login);

    }

    public function getAll(){
        $item = Shop::all();
        return $item;
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pointshop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        Shop::create($requestData);
        return redirect('pointshop')->with('flash_message', 'item Added!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getRedeemShop(){
        //$user = auth()->user();
        $list = new Shop();
        $list = $list->getRedeemShop();
        return response()->json($list);
    }

    public function getUserPoints(){
        //$user = auth()->user();
        $list = new User();
        $list = $list->getUser();
        return response()->json($list);
    }
}
