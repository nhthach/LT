<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamsDetail extends Model
{
	protected $table = 'examsdetail';

    protected $fillable =['id','exam_id','question_id'];

    public function Exams()
    {
        return $this->belongsTo(Exam::class, 'exam_id','id');
    }

    public function Question(){
    	return $this->belongsTo(Question::class, 'question_id','id');
    }

}
