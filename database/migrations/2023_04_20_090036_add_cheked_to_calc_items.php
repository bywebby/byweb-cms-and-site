<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChekedToCalcItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calc_items', function (Blueprint $table) {
            $table->tinyInteger('checked')->default(0);
            $table->tinyInteger('status')->default(1);

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
            $table->dropColumn("checked");
            $table->dropColumn("status");
        });
    }
}
