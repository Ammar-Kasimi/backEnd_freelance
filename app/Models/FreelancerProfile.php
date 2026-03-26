<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FreelancerProfile extends Model
{
    protected $fillable = ["tarrif","cv","availability",'user_id'];
    public function user():BelongsTo{
    return $this->belongsTo(User::class);
    }
    public function technologies(){
    return $this->belongsToMany(technology::class);
  }
    
}
