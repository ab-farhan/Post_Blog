<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session;

class CategoryController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $create=Category::where('category_status',1)->orderBy('id','DESC')->paginate(20);
        return view('admin.category.index',compact('create'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
       $this->validate($request,[
           'name'=>'required|unique:categories,category_name',
       ],[]);
       $slug=Str::slug($request->name,'-');
       $insert=Category::insertGetId([
           'category_name'=>$request['name'],
           'category_details'=>$request['details'],
           'category_slug'=>$slug,
           'created_at'=>Carbon::now()->toDateTimeString(),
       ]);
       
            Session::flash('success','Category Created Successfully');
            return redirect()->back();
      

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category){
        return view('admin.category.edit',compact('category'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category){
        $id=$request->id;
        $this->validate($request,[
            'name'=>'required|unique:categories,category_name,'.$id,
        ],[]);

        $category->category_name = $request->name;
        $category->category_details = $request->details;
        $category->category_slug = Str::slug($request->name,'-');
        $category->updated_at= Carbon::now()->toDateTimeString();
        $category->save();

        Session::flash('success','Successfully Updated Category!!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category){
            $category->delete();

            Session::flash('success','Successfully Delete Category!!');
            return redirect()->back();
        }

    }
}
