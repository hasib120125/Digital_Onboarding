<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $fillable = [
        'emp_state_id',
        'document_name',
        'order_by',
        'status'
    ];
    protected $dates = [
        'started_at',
        'ended_at'
    ];

    public function employmentState(){

        $this->belongsTo('App\Models\EmploymentState');
    }

    public function checklistFeedback()
    {
        $this->hasMany('App\Models\ChecklistFeedback');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
