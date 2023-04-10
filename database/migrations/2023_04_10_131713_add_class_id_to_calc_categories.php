<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\admin\calc\CalcClasses;

class AddClassIdToCalcCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calc_categories', function (Blueprint $table) {
            $table->foreignIdFor(CalcClasses::class)->constrained('calc_classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calc_categories', function (Blueprint $table) {
            $table->dropColumn("calc_classes_id");
        });
    }
}
