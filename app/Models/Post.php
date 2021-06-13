<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Post extends Model{
    use HasFactory;
    use Commentable;
    
    protected $primaryKey='id';
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
    public function users(){
        return $this->belongsTo('App\Models\User','post_creator_id','id');
    } 
    public function tags(){
        return $this->hasMany(Tag::class);
    }
    
    
}
