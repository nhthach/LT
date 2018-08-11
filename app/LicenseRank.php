<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LicenseRank extends Model
{
	 protected $table = 'licenseranks';

   protected $fillable =['licensetype_id','name','nbquestion','nbcorrect','qt_type_text',
   						 'qt_type_icon','qt_type_pic','isactive','created_at','updated_at'];
   protected $appends = ['examCount'];

   	
   public function licenseType()
    {
        return $this->belongsTo(LicenseType::class,'licensetype_id','id');
    }

    public function exams(){
    	return $this->hasMany(Exam::class,'licenserank_id','id');
    }					 
    
    public function getExamCountAttribute()
    {
        return $this->exams()->count();
    }
}
