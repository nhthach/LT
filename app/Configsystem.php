<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configsystem extends Model
{
   protected $table = 'configsystem';

   protected $fillable =['title','metacontent ','isactive'];
}
