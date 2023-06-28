<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DelColumnCalcModuleIdToCalcItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calc_items', function (Blueprint $table) {
            $table->dropForeign('calc_items_calc_module_id_foreign');
            $table->dropColumn("calc_module_id");
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
            $table->foreignIdFor(\App\Models\admin\calc\CalcModule::class)->constrained('calc_modules');
        });
    }
}
