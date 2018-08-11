<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class UserController extends Controller
{
    
    public function index(){
        return view('frondend.layouts.user');
    }
}
