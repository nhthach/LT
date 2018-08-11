<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LicenseType;
use App\LicenseRank;
class LicenseController extends Controller
{
    

   public function  adminIndex(){
        $licenseTypes=LicenseType::all();
        $licenseRanks = LicenseRank::with('licenseType')->get();
        $rank = LicenseRank::findOrFail(1);
        $breadcrumb = "Manage Lincese Type &  Rank ( Class )";
        return view('backend.license',['breadcrumb'=>$breadcrumb,'licenseTypes' => $licenseTypes, 'licenseRanks'=>$licenseRanks]);
    }

}
