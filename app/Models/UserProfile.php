<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'preffered_name',
        'date_of_birth',
        'hobbies',
    ];
    public function user(){
        $this->belongsTo('App\Models\Users');
    }
}
