<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\admin\calc\CalcClasses;
use App\Models\admin\calc\CalcType;

class AddClassIdAdnTypeIdToCalcTitles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calc_titles', function (Blueprint $table) {
            $table->foreignIdFor(CalcClasses::class)->constrained('calc_classes');
            $table->foreignIdFor(CalcType::class)->constrained('calc_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calc_titles', function (Blueprint $table) {
            $table->dropColumn("calc_classes_id");
            $table->dropColumn("calc_types_id");
        });
    }
}
