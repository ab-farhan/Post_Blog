<?php

namespace App\Http\Controllers;

use App\Models\Manage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Auth;
use Image;

class ManageController extends Controller{
    public function __construct(){

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $manage=Manage::firstOrFail();
        return view('admin.manage.index',compact('manage'));
    }

    

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manage  $manage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
       // এই ভাবে আপডেট করতে হলে  input er name এবং  database filed er নাম   এক  রাখতে হয় 
        $this->validate($request,[
            'name'=>'required',
            'copyright'=>'required',
        ]);
    
        $manage = Manage::first();
        $manage->update($request->all());
        if($request->hasFile('header_logo')){
            $image=$request->file('header_logo');
            $imageName='Header-Logo-'.time().'-'.'.'.$image->getClientOriginalExtension();
            Image::make($image)->save(base_path('public/uploads/logo/'.$imageName));
            if(file_exists(base_path('public/uploads/logo/'.$manage->header_logo))){
                unlink(base_path('public/uploads/logo/'.$manage->header_logo));  // <<--- image delete form core folder
                
            }
            $manage->header_logo=$imageName;
        }
        if($request->hasFile('footer_logo')){
            $image=$request->file('footer_logo');
            $imageName='footer-Logo-'.time().'-'.'.'.$image->getClientOriginalExtension();
            Image::make($image)->save(base_path('public/uploads/logo/'.$imageName));
            if(file_exists(base_path('public/uploads/logo/'.$manage->footer_logo))){
                unlink(base_path('public/uploads/logo/'.$manage->footer_logo));  // <<--- image delete form core folder
                
            }
            $manage->footer_logo=$imageName;
        }
        if($request->hasFile('favicon')){
            $image=$request->file('favicon');
            $imageName='favicon-Logo-'.time().'-'.'.'.$image->getClientOriginalExtension();
            Image::make($image)->save(base_path('public/uploads/logo/'.$imageName));
            if(file_exists(base_path('public/uploads/logo/'.$manage->favicon))){
                unlink(base_path('public/uploads/logo/'.$manage->favicon));  // <<--- image delete form core folder
                
            }
            $manage->favicon=$imageName;
        }
        $manage->address=$request->address;
        $manage->updated_at=Carbon::now()->toDateTimeString();
        $manage->save();
        
        Session::flash('success','Successfully Updated');
        return redirect()->back();
    }

}
