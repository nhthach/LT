<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
   protected $table = 'articles';

   protected $fillable =['title','content','isactive','created_at','updated_at'];
   protected $hidden = ['user_id'];

  public function scopeGetAllSort(){
		$topView =  Article::where('isactive', '=', 1 )->orderByRaw('view DESC')->get();
   	    return $topView; 
   }

   public function scopeGetTopNews($number){
		$topView =  Article::with('category')->where('isactive', '=', 1 )
                                         ->orderByRaw('view DESC')
                                         ->take(5)->get();
   	    return $topView; 
   }

   public function scopeGetTopTips($number){
    $topView =   Article::with('category')->where('isactive', '=', 1 )->orderByRaw('view DESC')->take(10)->get();
        return $topView; 
   }


   public function category()
    {
         return $this->belongsTo(Category::class,'category_id', 'id');
    }
}
