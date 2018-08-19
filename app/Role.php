<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

	protected $appends = [
        'adminCount'
    ];

    protected $fillable = [
        'name', 'slug', 'permissions',
    ];
    protected $casts = [
        'permissions' => 'array',
    ];
   
  	public function admins()
	{
	  return $this->belongsToMany(Admin::class);
	}

	public function getAdminCountAttribute  (){
    	return $this->admins()->count();
    }

    public function hasAccess(array $permissions, string $action) : bool
    {
        foreach ($permissions as $permission) {
            if ($this->hasPermission($permission, $action))
                return true;
        }
        return false;
    }

    private function hasPermission(string $permission,string $action) : bool
    {
        return $this->permissions[$permission][$action] == 'yes' ?? false;
    }
}
