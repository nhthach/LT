<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	 protected $table = "categories";

     protected $appends = [
        'articleCount'
     ];

     protected $fillable = [
        'name', 'parent_id', 'is_active',
    ];

    protected $guarded = ['id'];

    public function articles(){
         return $this->hasMany(Article::class,'category_id','id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }


    public function childrenArticles()
    {
        return $this->hasManyThrough(Article::class, Category::class, 'parent_id');
    }

    public function getArticleCountAttribute()
    {
        return $this->articles()->count() + $this->childrenArticles()->count();
    }

   
}
