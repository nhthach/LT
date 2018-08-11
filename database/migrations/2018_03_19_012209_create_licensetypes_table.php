<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicensetypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licensetypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('img')->default('img/page/moto.png');
            $table->boolean('isactive')->default('1');
            $table->timestamps();
        });
    } // 2 banh hay 4 banh

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licensetypes');
    }
}
