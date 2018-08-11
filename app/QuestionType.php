<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{
	protected $table = 'questiontypes';
	protected $appends = [
        'questionCount'
    ];

    protected $fillable =['name','isactive','created_at','updated_at'];

    public function questions()
   {
        return $this->hasMany(Question::class,'questiontype_id', 'id');
   }

    public function getQuestionCountAttribute()
    {
        return $this->questions()->count();
    }

   
}
