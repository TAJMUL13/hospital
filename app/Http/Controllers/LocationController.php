<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Locations;
use DB;

class LocationController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    // for permission check---start
    $id= auth()->id();
    $all_permissions = DB::table('users')->where('id','=',$id)->get();
    $my_permission= unserialize($all_permissions[0]->permissions);

    if (!in_array('location_list',$my_permission)) {
        return Redirect()->route('dashboard');
    }
    // for permission check---end

     
         $all_data = Locations::get();
        return view('pages.location_view',compact('all_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    // for permission check---start
    $id= auth()->id();
    $all_permissions = DB::table('users')->where('id','=',$id)->get();
    $my_permission= unserialize($all_permissions[0]->permissions);

    if (!in_array('location_add',$my_permission)) {
        return Redirect()->route('dashboard');
    }
    // for permission check---end

        return view('pages.location_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    // for permission check---start
    $id= auth()->id();
    $all_permissions = DB::table('users')->where('id','=',$id)->get();
    $my_permission= unserialize($all_permissions[0]->permissions);

    if (!in_array('location_add',$my_permission)) {
        return Redirect()->route('dashboard');
    }
    // for permission check---end

        $data= $request->except('_token');
        Locations::create($data);

        $notification = array(
            'message' => 'Location created successfully!',
            'alert-type' => 'success',
            'title'=>'Success'
        );
        return Redirect()->route('location/list')->with($notification);
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    // for permission check---start
    $id= auth()->id();
    $all_permissions = DB::table('users')->where('id','=',$id)->get();
    $my_permission= unserialize($all_permissions[0]->permissions);

    if (!in_array('location_edit',$my_permission)) {
        return Redirect()->route('dashboard');
    }
    // for permission check---end

        $datas = Locations::find($id);

        
        return view('pages.location_edit',compact('datas'));

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

    // for permission check---start
    $id= auth()->id();
    $all_permissions = DB::table('users')->where('id','=',$id)->get();
    $my_permission= unserialize($all_permissions[0]->permissions);

    if (!in_array('location_edit',$my_permission)) {
        return Redirect()->route('dashboard');
    }
    // for permission check---end

       $updated_information= $request->all();
        Locations::find($id)->update($updated_information);
        $notification = array(
            'message' => 'Location updated successfully!',
            'alert-type' => 'success',
            'title'=>'Success'
        );

        return Redirect()->route('location/list')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    // for permission check---start
    $id= auth()->id();
    $all_permissions = DB::table('users')->where('id','=',$id)->get();
    $my_permission= unserialize($all_permissions[0]->permissions);

    if (!in_array('location_delete',$my_permission)) {
        return Redirect()->route('dashboard');
    }
    // for permission check---end

        Locations::find($id)->delete();

        $notification = array(
            'message' => 'Location deleted successfully!',
            'alert-type' => 'success',
            'title'=>'Success'
        );
        return Redirect()->route('location/list')->with($notification);
    }
}
