<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
     protected $table = "answers";

    public function parent()
    {
        return $this->belongsTo(Question::class, 'question_id','id');
    }

}
