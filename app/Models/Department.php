<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function user(){
        $this->hasMany('App\Models\User');
    }

    public function division(){
        $this->belongsTo('App\Models\Division');
    }
}
