<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    
    public function adminIndex(){

        $roles=Role::all();
        $breadcrumb = "Manage Role";
        return view('backend.role',['breadcrumb'=>$breadcrumb,'roles' => $roles]);
    }
}
