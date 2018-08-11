<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Admin;

class AdminController extends Controller
{
     use AuthenticatesUsers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:admin');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    // public function adminLogin(){
    //     return view('backend.auth.login');
    // }

    public function adminAuth (Request $request){}

    public function index()
    {
        $breadcrumb = "Index";
        return view('backend.index',['breadcrumb'=>$breadcrumb]);
    }

    public function adminIndex(){

        $admins=Admin::all();
        $breadcrumb = "Manage Admin";
        return view('backend.admin',['breadcrumb'=>$breadcrumb,'admins' => $admins]);
    }
}
