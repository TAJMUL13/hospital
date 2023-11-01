<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
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

    if (!in_array('user_list',$my_permission)) {
        return Redirect()->route('dashboard');
    }
    // for permission check---end

        $all_data = User::get();
        return view('pages.user_view',compact('all_data'));
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

    if (!in_array('user_add',$my_permission)) {
        return Redirect()->route('dashboard');
    }
    // for permission check---end

        $all_permissions = DB::table('permissions')->get();
        return view('pages.user_create',compact('all_permissions'));
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

    if (!in_array('user_add',$my_permission)) {
        return Redirect()->route('dashboard');
    }
    // for permission check---end

        $data= $request->except('_token');
        $get_permission= serialize($data['permissions']);
        $data['permissions']=$get_permission;
        $data['password']=Hash::make($data['password']);
// print_r($data);die();
        User::create($data);

        $notification = array(
            'message' => 'Location created successfully!',
            'alert-type' => 'success',
            'title'=>'Success'
        );
        return Redirect()->route('user/list')->with($notification);
 
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

    if (!in_array('user_edit',$my_permission)) {
        return Redirect()->route('dashboard');
    }
    // for permission check---end

        $data = User::find($id);

        $all_permissions = DB::table('permissions')->get();

        return view('pages.user_edit',compact('data','all_permissions'));

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

    if (!in_array('user_edit',$my_permission)) {
        return Redirect()->route('dashboard');
    }
    // for permission check---end

       $updated_information= $request->all();

       	// $data= $request->except('_token');
        $get_permission= serialize($updated_information['permissions']);
        $updated_information['permissions'] = $get_permission;

		unset($updated_information['password']);
        User::find($id)->update($updated_information);
        $notification = array(
            'message' => 'User  updated successfully!',
            'alert-type' => 'success',
            'title'=>'Success'
        );

        return Redirect()->route('user/list')->with($notification);
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

    if (!in_array('case_delete',$my_permission)) {
        return Redirect()->route('dashboard');
    }
    // for permission check---end

        User::find($id)->delete();

        $notification = array(
            'message' => 'User deleted successfully!',
            'alert-type' => 'success',
            'title'=>'Success'
        );
        return Redirect()->route('user/list')->with($notification);
    }
}
