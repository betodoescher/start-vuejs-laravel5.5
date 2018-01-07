<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalancasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balancas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
            $table->char('porta',5);
            $table->smallInteger('velocidade_porta');
            $table->smallInteger('bits_dados');
            $table->smallInteger('bits_parada');
            $table->smallInteger('paridade');
            $table->char('bloqueada',1);

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
        Schema::dropIfExists('balancas');
    }
}
