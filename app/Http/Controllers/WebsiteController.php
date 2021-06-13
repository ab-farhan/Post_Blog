<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Contactus;
use Carbon\Carbon;
use Session;

class WebsiteController extends Controller
{
    public function index(){
        $tags=Tag::all();
        $post_tag=PostTag::all();
        $post=Post::with('category','users')->orderBy('created_at','DESC')->take(5)->get();
        $postfirst=$post->splice(0,2);
        $postmiddle=$post->splice(0,1);
        $postlast=$post->splice(0);
        $recentPost=Post::with('category','users')->where('post_status',1)->orderBy('id','DESC')->take(6)->get();
        $footerpost=Post::with('category','users')->inRandomOrder(4)->get();
        $fpostfirst=$footerpost->splice(0,1);
        $fpostmiddle=$footerpost->splice(0,1);
        $fpostlast=$footerpost->splice(0,2);
        return view('website.index',compact('post','recentPost','post_tag','tags','postfirst','postmiddle','postlast','footerpost','fpostfirst','fpostmiddle','fpostlast'));
    }

    public function about(){
        return view('website.about');
    }

    public function post($slug){
        $footerpost=Post::with('category','users')->inRandomOrder()->take(4)->get();
        $fpostfirst=$footerpost->splice(0,1);
        $fpostmiddle=$footerpost->splice(0,1);
        $fpostlast=$footerpost->splice(0,2);
        //
        $post=Post::where('post_status',1)->where('post_slug',$slug)->with('category','users','category')->firstOrFail();
        $tags=Tag::where('tag_status',1)->take(10)->get();
        $post_tag=PostTag::all();
        $category=Category::where('category_status',1)->latest()->take(8)->get();
        $random=Post::with('category','users')->inRandomOrder()->limit(3)->get();
        if($post){
            return view('website.post',compact('post','post_tag','tags','category','random','footerpost','fpostfirst','fpostmiddle','fpostlast'));
        }else{
            return view('website.index');
        }
        
    }

    public function category($slug){
        $post_tag=PostTag::all();
        $category=Category::where('category_slug',$slug)->firstOrFail();
        $post_count=Post::where('post_status',1)->where('category_id',$category->id)->count();
        $posts=Post::where('post_status',1)->where('category_id',$category->id)->paginate(9);
        if($category){
        return view('website.category',compact('category','post_tag','post_count','posts'));
        }else{
            return redirect()->route('website.home');
        }
    }

    public function contact(){
        return view('website.contact');
    }
    public function allpost(){
        $post=Post::where('post_status',1)->with('category','users','category')->latest()->paginate(9);
        $post_tag=PostTag::all();
        return view('website.allpost',compact('post','post_tag'));
    }

    public function contactus_message(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);
        $contactus=Contactus::insertGetId([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        
    
        if($contactus){
            Session::flash('success_mes');
            return redirect()->back();
        }else{
            Session::flash('error_mes');
            return redirect()->back();
        }
    }
    

}
