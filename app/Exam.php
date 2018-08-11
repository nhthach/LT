<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = 'exams';

    protected $fillable =['id','licenserank_id','name','isactive','created_at','updated_at'];

    protected $appends = [
        'exDetailCount'
    ];


    public function licenseRank()
    {
        return $this->belongsTo(LicenseRank::class,'licenserank_id','id');
    }

    public function examsDetail(){
 		return $this->hasMany(ExamsDetail::class,'exam_id','id');
    }


    public function getExDetailCountAttribute (){
    	return $this->examsDetail()->count();
    }

    public function getRank(){
        return LicenseRank::where('id', $this->licenserank_id)->first();
    }

}
