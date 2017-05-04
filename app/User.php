<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_role', 'user_id', 'role_id'); // many-to-many user_role correspondence
                                                                                    // foreign key: user_id
    }
    
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach($roles as $role) { // check if $this has all of the roles
                if ($this->hasRole($role)) { 
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false; // doesnt have any of the roles
    }

    public function hasRole($role) // check if a user has a role
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id', 
        'firstname', 
        'lastname', 
        'email', 
        'contact_num',
        'position',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {   
        return $this->attributes['password'] = bcrypt($password);
    }
    /*
    public function notifications()
    {
        return $this->hasMany('Notification');
    }

    public function newNotification()
    {
        $notification = new Notification;
        $notification->user()->associate($this);
    
        return $notification;
    }
    */
    
}
