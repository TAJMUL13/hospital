<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Priorities;
use App\Categories;
use DB;

class CategoryController extends Controller
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

    if (!in_array('category_list',$my_permission)) {
        return Redirect()->route('dashboard');
    }
    // for permission check---end

	$all_data= DB::table('categories')
                ->join('priorities', 'categories.priority_id', 'priorities.id')
                ->select('categories.*','priorities.priority_name as priority_name')
                ->get();
                    // $datas_p = Priorities::get();
        return view('pages.category_view',compact('all_data'));

    
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

    if (!in_array('category_add',$my_permission)) {
        return Redirect()->route('dashboard');
    }
    // for permission check---end

         $datas=Priorities::get();
        return view('pages.category_create',compact('datas'));
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

    if (!in_array('category_add',$my_permission)) {
        return Redirect()->route('dashboard');
    }
    // for permission check---end

        $data= $request->except('_token');
        Categories::create($data);

        $notification = array(
            'message' => 'Category created successfully!',
            'alert-type' => 'success',
            'title'=>'Success'
        );
        return Redirect()->route('category/list')->with($notification);
 
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

    if (!in_array('category_edit',$my_permission)) {
        return Redirect()->route('dashboard');
    }
    // for permission check---end

        $datas = Categories::find($id);

        $datas_p = Priorities::get();
        return view('pages.category_edit',compact('datas','datas_p'));

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

    if (!in_array('category_edit',$my_permission)) {
        return Redirect()->route('dashboard');
    }
    // for permission check---end
    
       $updated_information= $request->all();
        Categories::find($id)->update($updated_information);
        $notification = array(
            'message' => 'Categories updated successfully!',
            'alert-type' => 'success',
            'title'=>'Success'
        );

        return Redirect()->route('category/list')->with($notification);
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

    if (!in_array('category_delete',$my_permission)) {
        return Redirect()->route('dashboard');
    }
    // for permission check---end
    
        Categories::find($id)->delete();

        $notification = array(
            'message' => 'Categories deleted successfully!',
            'alert-type' => 'success',
            'title'=>'Success'
        );
        return Redirect()->route('category/list')->with($notification);
    }
}
