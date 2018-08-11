<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table){
            
            $table->increments('id')->index();
            $table->unsignedInteger('user_id')->nullable()->index();
            $table->unsignedInteger('category_id')->nullable()->index();
            $table->string('title');
            $table->string('shortcontent');
            $table->string('shortimg');
            $table->text('content');
            $table->integer('view')->default('1');   
            $table->boolean('isactive')->default('1');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('admins')->onDelete('SET NULL');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
