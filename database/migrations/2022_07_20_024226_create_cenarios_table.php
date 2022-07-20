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
        Schema::create('cenarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('historicos_id');
            $table->string('valor');
            $table->timestamps();
        });

        Schema::table('cenarios', function (Blueprint $table) {

            $table->foreign('historicos_id')->references('id')->on('historicos');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cenarios', function (Blueprint $table) {



            $table->dropForeign('cenarios_historicos_id_foreign');

        });

        Schema::dropIfExists('cenarios');
    }
};
