<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class technology extends Model
{
  protected $fillable = ['name'];
  public function missions(){
    return $this->belongsToMany(Mission::class);
  }
  public function freelancers(){
    return $this->belongsToMany(FreelancerProfile::class);
  }
  
}
