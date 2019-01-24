<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    public function user(){
        $this->hasMany('App\Models\User');
    }

    public function department(){
        $this->belongsTo('App\Models\Department');
    }
}
