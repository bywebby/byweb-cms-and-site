<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalcItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calc_items', function (Blueprint $table) {
            $table->id();
            //наименование
//            $table->integer('calc_title_id')->unsigned();
            $table->foreignIdFor(\App\Models\admin\calc\CalcTitle::class)->constrained('calc_titles');
            $table->float('price')->unsigned()->default(0);
            //если price ноль можно будет написать html заголовок
            $table->text('description')->nullable();

            $table->foreignIdFor(\App\Models\admin\calc\CalcModule::class)->constrained('calc_modules');
            //класс joomla, wp, bitrix ... справочник иконок
//            $table->integer('calc_class_id')->unsigned()->default(0);
            $table->foreignIdFor(\App\Models\admin\calc\CalcClass::class)->constrained('calc_classes');
            //radio chekbox правочник
//            $table->integer('calc_type_id')->unsigned();
            $table->foreignIdFor(\App\Models\admin\calc\CalcType::class)->constrained('calc_types');
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
        Schema::dropIfExists('calc_items');
    }
}
