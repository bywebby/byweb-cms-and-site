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
    {// требуется проверка кода
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique(); //уникальный
            $table->string('slug')->unique(); //уникальный
            $table->string('meta_title');
            $table->string('meta_desc');
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
        Schema::dropIfExists('categories');
    }
}
