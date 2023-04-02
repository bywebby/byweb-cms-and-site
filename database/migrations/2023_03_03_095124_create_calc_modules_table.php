<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalcModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calc_modules', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->default(null);
            //на какокой странице показывать - справочник категорий
//            $table->integer('category_id')->unsigned();
            $table->foreignIdFor(\App\Models\admin\Category::class)->constrained('categories');
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
        Schema::dropIfExists('calc_modules');
    }
}
