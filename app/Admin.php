<?php

namespace App;

use App\Notifications\AdminResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
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

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPassword($token));
    }

    public function roles()
    {
      return $this->belongsToMany(Role::class);
    }
    /**
    *
    */
    public function getName(){
        return $this->name;
    }
    public function isAdmin():bool
    {
        foreach ($this -> roles as $role) {
            if($role->name == 'manager'){
                return true;
            }
        }
        return false;
    }
    
    public function getRoles() 
    {
        $arr_roles = array();
        foreach ($this->roles as $role) {
         array_push($arr_roles, $role->name);
        }
       return implode(',',$arr_roles);
    }
     /**
     * Checks if User has access to $permissions.
     */

    public function hasAccess(array $permissions,string $action='read') : string
    {
        // check if the permission is available in any role
        foreach ($this->roles as $role) {
            if($role->hasAccess($permissions,$action)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Checks if the user belongs to role.
     */
    public function inRole(string $roleSlug)
    {
        return $this->roles()->where('slug', $roleSlug)->count() == 1;
    }
}
