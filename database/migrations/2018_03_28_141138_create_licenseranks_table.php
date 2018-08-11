<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicenseranksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenseranks', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->unsignedInteger('licensetype_id')->nullable()->index();
            $table->string('name',100);
            $table->integer('nbquestion'); // sl cau hoi
            $table->integer('nbcorrect');    // so cau tl dung
            $table->integer('qt_type_text');    // so cau tl dung
            $table->integer('qt_type_icon');    // so cau tl dung
            $table->integer('qt_type_pic');    // so cau tl dung
            $table->integer('timework');    // minute
            $table->boolean('isactive')->default('1');
            $table->timestamps();
            $table->foreign('licensetype_id')->references('id')->on('licensetypes')->onDelete('SET NULL');
        });
    }// A1, A1, A3, A4

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licenserank');
    }
}
