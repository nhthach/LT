<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestiontypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questiontypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->boolean('isactive')->default('1');
            $table->timestamps();
        });
    }// cau hoi hinh , bang, xa hinh

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questiontypes');
    }
}
