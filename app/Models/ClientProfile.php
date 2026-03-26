<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientProfile extends Model
{
    protected $fillable = ["company","desc",'user_id'];

    public function user():BelongsTo{
    return $this->belongsTo(User::class);
    }
    public function missions(){
        return $this->hasMany(Mission::class);
    }
}
