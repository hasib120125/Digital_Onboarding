<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmploymentState extends Model
{
    public function checklist(){

        $this->hasMany('App\Models\Checklist');
    }

    public function user(){

        $this->hasMany('App\Models\User');
    }
}
