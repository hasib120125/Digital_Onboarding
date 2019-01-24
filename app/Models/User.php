<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Wildside\Userstamps\Userstamps;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use HasRoles;
    use Userstamps;
    use Notifiable;
    use LogsActivity;
    use HasApiTokens;
    protected static $logName = 'users';
    protected static $logFillable = true;
    protected static $ignoreChangedAttributes = ['remember_token'];
    protected $dates = ['registered_at'];
    protected $guard_name = 'admin';
    protected $table='users';
    protected $fillable = [
      'id',
      'name',
      'email',
      'phone',
      'username',
      'designation',
      'code',
      'password',
      'source',
      'is_default_password',
      'division_id',
      'department_id',
      'unit_id',
      'emp_state_id',
      'is_active',
      'is_locked',
      'created_at',
      'token',
    ];
    protected $hidden = ['password', 'token', 'created_at', 'updted_at'];

    public function passwordHistories()
    {
        return $this->hasMany('App\Models\PasswordHistory');
    }

    public function division()
    {
        return $this->belongsTo('App\Models\Division');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function employmentState()
    {
        return $this->belongsTo('App\Models\EmploymentState');
    }

    public function userProfile(){
        return $this->hasOne('App\Models\UserProfile');
    }

    public function checklistFeedback()
    {
        return $this->hasMany('App\Models\ChecklistFeedback');
    }
}
