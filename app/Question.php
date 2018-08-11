<?php

namespace App;
use App\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable =['questiontype_id','licensetype_id','name','content ','suggestions','isactive','created_at','updated_at'];

    public function questionType()
    {
        return $this->belongsTo(QuestionType::class,'questiontype_id','id');
    }

    public function licenseType()
    {
        return $this->belongsTo(LicenseType::class,'licensetype_id', 'id');
    }

    public function examDetails()
    {
        return $this->hasMany(ExamsDetail::class,'question_id','id');
    }

    public function getExamId()
    {
        $data = $this->examDetails()->first();
        return $data != null ? $data->exam_id : null;
    }

    public function getLicenseRankId(){
        if($this->getExamId() != null)
            return Exam::findOrFail($this->getExamId())->licenserank_id;
        else
            return null;
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function updateExamDetail($exam_id)
    {
        if( $exam_id <= 0){ return; }

        $objExam = $this->examDetails()->get();

        foreach ($objExam as $v) {
            $ex_detail = ExamsDetail::findorFail($v['id']);
            if(!empty($ex_detail)){
                $ex_detail->exam_id = $exam_id;
                $ex_detail->question_id = $this->id;
                $ex_detail->save();
            }
        }
        return true;
    }
}
