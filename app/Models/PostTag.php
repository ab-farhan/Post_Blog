<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
class PostTag extends Model
{
    use HasFactory;

    protected $fillable =['post_id','tag_id'];
    
    public function tags(){
        return $this->belongsTo(Tag::class,'tag_id','id');
    }
    
}
