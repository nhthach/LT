<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examsdetail', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->unsignedInteger('exam_id')->nullable()->index();
            $table->unsignedInteger('question_id')->nullable()->index();

            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examsdetail');
    }
}
