
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('name',100);
            $table->string('url',100);
            $table->integer('sort')->default('0');
            $table->unsignedInteger('parent_id')->index()->nullable()->default(null);
            $table->boolean('isactive')->default('1');
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
