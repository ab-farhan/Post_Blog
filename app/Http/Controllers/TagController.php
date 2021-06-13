<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session;

class TagController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $tag=Tag::orderBy('id','DESC')->paginate(10);
        return view('admin.tag.index',compact('tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $tag=Tag::where('tag_status',1)->orderBy('id','DESC')->paginate(10);
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|unique:tags,tag_name',
        ],[]);

        $slug=Str::slug($request->name,'-');

        $create=Tag::insertGetId([
            'tag_name'=>$request->name,
            'tag_details'=>$request->details,
            'tag_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        Session::flash('success','Successfully!!  Tag Created');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag){
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag){
    
        return view('admin.tag.edit',compact('tag'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag){
        $id=$request->id;
        $this->validate($request,[
            'name'=>'required|unique:tags,tag_name,'.$id,
        ],[]);
        
        $tag->tag_name=$request->name;
        $tag->tag_details=$request->details;
        $tag->tag_slug=Str::slug($request->name,'-');
        $tag->updated_at= Carbon::now()->todateTimeString();
        $tag->save();

        Session::flash('success','Successfully Update Tag!!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if($tag){
            $tag->delete();
            Session::flash('success','Successfully Delete Tag!!');
            return redirect()->back();
        }
    }
}
