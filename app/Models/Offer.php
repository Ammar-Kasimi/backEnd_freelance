<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
   protected $fillable=["tarrif",'desc','mission_id','status'];
   public function freelancer(){
      return $this->belongsTo(FreelancerProfile::class,'freelancer_profile_id');
   }
   public function mission(){
      return $this->belongsTo(Mission::class);
   }
   
}
