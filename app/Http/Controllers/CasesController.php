<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cases;
use App\Nationalities;
use App\Categories;
use App\Priorities;
use App\Locations;
use DB;


class CasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {

    // for permission check---start
	$id= auth()->id();
	$all_permissions = DB::table('users')->where('id','=',$id)->get();
	$my_permission= unserialize($all_permissions[0]->permissions);

     if (!in_array('case_list',$my_permission)) {
     	return Redirect()->route('dashboard');
     }
 	// for permission check---end

        $all_data = Cases::get();
        return view('pages.case_view',compact('all_data'));
    }


    public function indexArchive()
    {

	 // for permission check---start
		$id= auth()->id();
		$all_permissions = DB::table('users')->where('id','=',$id)->get();
		$my_permission= unserialize($all_permissions[0]->permissions);

	     if (!in_array('case_list',$my_permission)) {
	     	return Redirect()->route('dashboard');
	     }
	 	// for permission check---end
     
         $all_data = Cases::where('is_archive','=','1')->get();
        return view('pages.case_archive_view',compact('all_data'));
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

     if (!in_array('case_add',$my_permission)) {
     	return Redirect()->route('dashboard');
     }
 	// for permission check---end


        $nationality_s = Nationalities::get();
        // $category 	= Categories::get();
        $priority_s 	= Priorities::get();
        $location_s 	= Locations::get();
        return view('pages.case_create',compact('nationality_s','priority_s','location_s'));
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

     if (!in_array('case_add',$my_permission)) {
     	return Redirect()->route('dashboard');
     }
 	// for permission check---end

        $data= $request->except('_token');
        Cases::create($data);
// print_r($data);
// die();
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

     if (!in_array('case_edit',$my_permission)) {
     	return Redirect()->route('dashboard');
     }
 	// for permission check---end

    	 $nationality_s = Nationalities::get();
        // $category 	= Categories::get();
        $priority_s 	= Priorities::get();
        $location_s 	= Locations::get();

        $datas = Cases::find($id);
        return view('pages.case_edit',compact('nationality_s','priority_s','location_s','datas'));

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

     if (!in_array('case_update',$my_permission)) {
     	return Redirect()->route('dashboard');
     }
 	// for permission check---end

       $updated_information= $request->all();
        Cases::find($id)->update($updated_information);

        $notification = array(
            'message' => 'Case updated successfully!',
            'alert-type' => 'success',
            'title'=>'Success'
        );

        return Redirect()->route('case/list')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	// $updated_information=array();
 // for permission check---start
	$id= auth()->id();
	$all_permissions = DB::table('users')->where('id','=',$id)->get();
	$my_permission= unserialize($all_permissions[0]->permissions);

	if (!in_array('case_delete',$my_permission)) {
		return Redirect()->route('dashboard');
	}
	// for permission check---end

        Cases::find($id)->update(array('is_archive'=>'1'));

        $notification = array(
            'message' => 'Case archived successfully!',
            'alert-type' => 'success',
            'title'=>'Success'
        );
        return Redirect()->route('case/list')->with($notification);
    }




    public function getCategory($id) 
    {
        $subjects = DB::table("categories")->where("priority_id",$id)->pluck("category_name","id");
        return json_encode($subjects);
    }
}
