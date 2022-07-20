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
        Schema::create('historicos', function (Blueprint $table) {
            $table->id();
            $table->string('ambiente');
            $table->unsignedBigInteger('cenarios_id')->nullable();
            $table->unsignedBigInteger('investimentos_id')->nullable();
            $table->string('investimentos');
            $table->string('cenarios');
            $table->string('maximax');
            $table->string('maximin');
            $table->string('maiores_tabela');
            $table->string('vme');
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
        Schema::dropIfExists('historicos');
    }
};
