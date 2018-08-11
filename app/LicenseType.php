<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LicenseType extends Model
{
	protected $table = 'licensetypes';
  protected $appends = [
        'questionCount','licenseRankCount'
    ];



   protected $fillable =['name','isactive','created_at','updated_at'];

   public function questions()
   {
        return $this->hasMany(Question::class,'licensetype_id', 'id');
   }

   public function getQuestionCountAttribute()
    {
        return $this->questions()->count();
    }

   public function licenseranks()
   {
        return $this->hasMany(LicenseRank::class,'licensetype_id', 'id');
   }

   public function getLicenseRankCountAttribute(){
   	  return $this->licenseranks()->count();
   }


}
