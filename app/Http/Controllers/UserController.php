<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session;
use Auth;
use Image;

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
        $users= User::latest()->paginate(10);
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email|max:255',
            'password' => 'required|confirmed|min:8',
        ],[]);
        $user= User::insertGetId([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'image'=>'image',
            'password'=>Hash::make($request->password),
            'description'=>$request->description,
            'slug'=>Str::slug($request->name,'-'),
            'created_at'=> Carbon::now()->toDateTimeString(),
        ]);
        
        if($user){
            Session::flash('success','Successfully!! user ceated');
            return redirect()->back();
        }else{
            Session::flash('error','Opps!!! Try Again');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user){
        $id=$request->id;
        $slug=$request->slug;
        $this->validate($request,[
            'name'=>'required|string|max:60',
            'email'=>"required|email|max:200|unique:users,email,$user->id",
        ],[]);
        
             $user->name = $request->name;
             $user->email = $request->email;
             $user->phone = $request->phone;
             if($request->password != ''){
                $user->password = Hash::make($request->password);
             }
             $user->description = $request->description;
             $user->slug = Str::slug($request->name,'-');
             $user->updated_at= Carbon::now()->toDateTimeString();
             $user->save();

             Session::flash('success','Successfully!! user updated');
             return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user){
        if($user){
            if(file_exists(base_path('public/uploads/user/'.$user->image))){
                unlink(base_path('public/uploads/user/'.$user->image));  // <<--- image delete form core folder
                
        }
            $user->delete();
            Session::flash('success','Seccessfully Deleted User');
        }
    }

    public function profile(){
        $user=Auth::user();
        return view('admin.user.profile',compact('user'));
    }

    public function profile_update(Request $request){
        //যেই ইউজার লগইন অবস্থায় থাকবে তার data আপডেট হবে 
        $user=Auth::user();
        $id=$request->id;
        $this->validate($request,[
            'name'=>'required|string|max:60',
            'email'=>"required|email|max:200|unique:users,email,".$id,
            'password' => 'sometimes|nullable|min:8',
            'image'=>'sometimes|nullable|image|max:2048',
            
        ],[]);

        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        if($request->password != ''){
            $user->password=$request->password;
        }
        $user->phone=$request->phone;
        $user->description=$request->description;
        $user->slug=Str::slug($request->description,'-');
        if($request->hasFile('image')){
            $image=$request->file('image');
            $imageName='user-'.time().'-'.$id.'.'.$image->getClientOriginalExtension();
            Image::make($image)->save(base_path('public/uploads/user/'.$imageName));
            if(file_exists(base_path('public/uploads/user/'.$user->image))){
                unlink(base_path('public/uploads/user/'.$user->image));  // <<--- image delete form core folder
                
            }
            $user->image=$imageName;
            
        }
        $user->updated_at=Carbon::now()->toDateTimeString();
        $user->save();

        Session::flash('success','Successfully!! user updated');
        return redirect()->back();
    }

}
