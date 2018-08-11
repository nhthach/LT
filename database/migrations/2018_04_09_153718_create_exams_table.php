<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->unsignedInteger('licenserank_id')->nullable()->index();
            $table->string('name',100);
            $table->boolean('isactive')->default('1');    
            $table->timestamps();
            $table->foreign('licenserank_id')->references('id')->on('licenseranks')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
}
