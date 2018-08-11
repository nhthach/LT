<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsytemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configsystem', function (Blueprint $table) {
            $table->string('id',100)->index();
            $table->string('title',100);
            $table->string('icon',200);
            $table->string('imgpage',200);
            $table->text('metacontent');
            $table->text('description');
            $table->boolean('isactive')->default('1');
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
        Schema::dropIfExists('configsystem');
    }
}
