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
        Schema::create('investimentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cenarios_id');
            $table->string('investimento_valor');
            $table->timestamps();
        });

        Schema::table('investimentos', function (Blueprint $table) {

            $table->foreign('cenarios_id')->references('id')->on('cenarios');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('investimentos', function (Blueprint $table) {



            $table->dropForeign('investimentos_cenarios_id_foreign');

        });

        Schema::dropIfExists('investimentos');
    }
};
