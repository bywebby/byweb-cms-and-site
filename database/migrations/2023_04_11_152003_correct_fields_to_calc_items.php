<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\admin\calc\CalcCategory;

class CorrectFieldsToCalcItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calc_items', function (Blueprint $table) {
            Schema::dropIfExists('calc_class_id');
            Schema::dropIfExists('calc_type_id');
            $table->foreignIdFor(CalcCategory::class)->constrained('calc_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calc_items', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\admin\calc\CalcClasses::class)->constrained('calc_classes');
            $table->foreignIdFor(\App\Models\admin\calc\CalcType::class)->constrained('calc_types');
        });
    }
}
