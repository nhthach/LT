<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->unsignedInteger('questiontype_id')->nullable()->index();
            $table->unsignedInteger('licensetype_id')->nullable()->index();
            $table->string('name',100);
            $table->text('content');
            $table->text('suggestions');
            $table->boolean('isactive')->default('1');
            $table->timestamps();
            $table->foreign('questiontype_id')->references('id')->on('questiontypes')->onDelete('SET NULL');
            $table->foreign('licensetype_id')->references('id')->on('licensetypes')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
