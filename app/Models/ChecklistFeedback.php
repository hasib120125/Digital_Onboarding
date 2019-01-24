<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChecklistFeedback extends Model
{
  protected $fillable = [
    'user_id',
    'checklist_id'
  ];
  protected $dates = [
    'started_at',
    'ended_at'
  ];

  public function user()
  {
      return $this->belongsTo('App\Models\User', 'user_id');
  }
  
  public function checklist()
  {
    return $this->belongsTo('App\Models\Checklist', 'checklist_id');
  }

}
