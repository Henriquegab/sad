<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('historicos', function (Blueprint $table) {

            $table->foreign('cenarios_id')->references('id')->on('cenarios');
            $table->foreign('investimentos_id')->references('id')->on('investimentos');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('historicos', function (Blueprint $table) {



            $table->dropForeign('historicos_cenarios_id_foreign');
            $table->dropForeign('historicos_investimentos_id_foreign');

        });
    }
};
