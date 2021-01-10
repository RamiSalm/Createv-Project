<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pation extends Model
{
    protected $guarded = [];

    public function user(){

        return $this->belongsTo(User::class);
        
    }
}
