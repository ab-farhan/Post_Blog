<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostTag;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session;
use Auth;
use Image;


class PostController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $tags=Tag::all();
        $post_tag=PostTag::all();
        $post=Post::where('post_status',1)->orderBy('id','DESC')->paginate(20);
        return view('admin.post.index',compact('post','tags','post_tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $tags=Tag::all();
        $category=Category::where('category_status',1)->orderBy('category_name','ASC')->get();
        return view('admin.post.create',compact('category','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        // dd($request->tags);
        $this->validate($request,[
            'title'=>'required|unique:posts,post_title',
            'category'=>'required',
            'image'=>'required',
            'description'=>'required',
        ],[]);

        $create=Post::insertGetId([
            'post_title'=>$request->title,
            'category_id'=>$request->category,
            'post_creator_id'=>Auth::user()->id,
            'post_description'=>$request->description,
            'post_image'=>'image.jpg',
            'post_slug'=>Str::slug($request->title,'-'),
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
    
        //  $create->tags()->attach($request->tags[]);
        if(count($request->tags)>0){
            foreach($request->tags as $tag){
                // $tag = new PostTag();
                // $tag->post_id = $create;
                // $tag->tag_id = $tag;
                // $tag->save();
                PostTag::create([
                    'post_id' => $create, 
                    'tag_id' =>$tag,
                    ]);
            }
        }

        if($request->has('image')){
            $image=$request->image;
            $imageName='post-'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->save(base_path('public/uploads/post/'.$imageName));
            Post::where('id',$create)->update([
                'post_image'=>$imageName,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }
        
        Session::flash('success','Successfully Post Creat');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post){
        $tags=Tag::all();
        $post_tag=PostTag::all();
        return view('admin.post.show',compact('post','tags','post_tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post){
        $tags=Tag::all();
        $postTag=PostTag::all();
        $category=Category::where('category_status',1)->orderBy('category_name','ASC')->get();
        return view('admin.post.edit',compact('post','category','tags','postTag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post){

        $id=$request->id;
        $slug=$request->slug;
        
        $this->validate($request,[
            'title'=>'required|unique:posts,post_title,'.$id,
            'category'=>'required',
            'description'=>'required',
        ],[]);

            $post->post_title = $request->title;
            $post->category_id = $request->category;
            $post->post_description = $request->description;
            $post->post_slug = Str::slug($request->title,'-');
            $post->updated_at = Carbon::now()->toDateTimeString();
            $post->save();

            if($request->hasFile('image')){
                $image=$request->file('image');
                $imageName='post-'.time().'.'.$image->getClientOriginalExtension();
                Image::make($image)->save(base_path('public/uploads/post/'.$imageName));
                Post::where('id',$id)->update([
                    'post_image'=>$imageName,
                    'updated_at'=>Carbon::now()->toDateTimeString(),
                ]);
            }

           
            Session::flash('success','Successfully Post Updated');
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post){
            // image delete form folder & database
            // if(file_exists(base_path('public/uploads/post/'.$post->post_image))){
            //     unlink(base_path('public/uploads/post/'.$post->post_image));

            //     $post->post_image = ''; // <<---image delete form database
            //     $post->save();                                                        // <<<---- image delete form database and core folder
            // }

            if(file_exists(base_path('public/uploads/post/'.$post->post_image))){
                    unlink(base_path('public/uploads/post/'.$post->post_image));  // <<--- image delete form core folder
                    
            }
            $post->delete();
            Session::flash('success','Successfully Delete Post');
            return redirect()->back();
        }
    }
}
