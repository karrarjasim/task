<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function files()
    {
      return $this->hasMany(File::class);
    }
    public function uploads()
{
   return $this->hasMany(Upload::class);
}

public function roles(){
    return $this->belongsToMany('App\Role','roles_users','user_id','role_id');
}
public function hasAnyRole($roles){
    if (is_array($roles)){
        foreach ($roles as $role){
            if ($this->hasRole($role)){
                return true;
            }
        }
    }else{
        if ($this->hasRole($roles)){
            return true;
        }
    }
    return false;
}
public function hasRole($role){
    if ($this->roles()->where('name',$role)->first()){
        return true;
    }
    return false;
}
}
