<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nationalities;
use DB;

class NationalityController extends Controller
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

         $all_data = Nationalities::get();
        return view('pages.nationality_view',compact('all_data'));
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

        return view('pages.nationality_create');
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
        Nationalities::create($data);

        $notification = array(
            'message' => 'Nationality created successfully!',
            'alert-type' => 'success',
            'title'=>'Success'
        );
        return Redirect()->route('nationality/list')->with($notification);
 
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

        $datas = Nationalities::find($id);
        return view('pages.nationality_edit',compact('datas'));

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
        Nationalities::find($id)->update($updated_information);

        $notification = array(
            'message' => 'Nationality updated successfully!',
            'alert-type' => 'success',
            'title'=>'Success'
        );

        return Redirect()->route('nationality/list')->with($notification);
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

        Nationalities::find($id)->delete();

        $notification = array(
            'message' => 'Nationality deleted successfully!',
            'alert-type' => 'success',
            'title'=>'Success'
        );
        return Redirect()->route('nationality/list')->with($notification);
    }
}
