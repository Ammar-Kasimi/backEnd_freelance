<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mission extends Model
{
    public function client():BelongsTo{
     return $this->belongsTo(ClientProfile::class);
    }   
    public function technologies(){
        return $this->belongsToMany(technology::class);
    }
    public function category (){
        return $this->belongsTo(Category::class);
    }
    protected $fillable = ['title','desc','budget','duree','status','category_id','client_id'];
    // public function users():BelongsTo{
    //  return $this->belongsTo(user::class);
    // }   
}
