<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Category;
use App\Configsystem;
use App\Article;
use Illuminate\Support\Facades\View;
use App\Library\Library as Library;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     public function __construct()
    {
    	 $categories = Category::GetAll();
    	 $config= Configsystem::firstOrFail();
    	 $topViewAds = Article::GetTopNews(6);
    	 $topTips = Article::GetTopTips(10);
    	 View::share(['categories' => $categories, 'config'=>$config,'topViewAds'=>$topViewAds,'topTips'=>$topTips]);
    }

}
