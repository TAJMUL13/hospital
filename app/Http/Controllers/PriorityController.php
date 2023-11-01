<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Priorities;
use DB;

class PriorityController extends Controller
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

    if (!in_array('nationality_list',$my_permission)) {
        return Redirect()->route('dashboard');
    }
    // for permission check---end

         $all_data = Priorities::get();
        return view('pages.priority_view',compact('all_data'));
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

    if (!in_array('nationality_add',$my_permission)) {
        return Redirect()->route('dashboard');
    }
    // for permission check---end

        return view('pages.priority_create');
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

    if (!in_array('nationality_add',$my_permission)) {
        return Redirect()->route('dashboard');
    }
    // for permission check---end

        $data= $request->except('_token');
        Priorities::create($data);

        $notification = array(
            'message' => 'Priority created successfully!',
            'alert-type' => 'success',
            'title'=>'Success'
        );
        return Redirect()->route('priority/list')->with($notification);
 
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

    if (!in_array('nationality_edit',$my_permission)) {
        return Redirect()->route('dashboard');
    }
    // for permission check---end

        $datas = Priorities::find($id);        
        return view('pages.priority_edit',compact('datas'));

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

    if (!in_array('nationality_edit',$my_permission)) {
        return Redirect()->route('dashboard');
    }
    // for permission check---end

       $updated_information= $request->all();
        Priorities::find($id)->update($updated_information);
        // print_r($updated_information);die();
        $notification = array(
            'message' => 'Priority updated successfully!',
            'alert-type' => 'success',
            'title'=>'Success'
        );

        return Redirect()->route('priority/list')->with($notification);
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

    if (!in_array('nationality_delete',$my_permission)) {
        return Redirect()->route('dashboard');
    }
    // for permission check---end

        Priorities::find($id)->delete();

        $notification = array(
            'message' => 'Priority deleted successfully!',
            'alert-type' => 'success',
            'title'=>'Success'
        );
        return Redirect()->route('priority/list')->with($notification);
    }
}
