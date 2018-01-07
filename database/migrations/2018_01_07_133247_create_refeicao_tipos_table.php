<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefeicaoTiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refeicao_tipos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao',20);
            $table->addColumn('integer', 'codigo_tipo_refeicao', ['unsigned' => true, 'length' => 1])->nullable(false);
            $table->time('hora_inicio_refeicao');
            $table->time('hora_final_refeicao');
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
        Schema::dropIfExists('refeicao_tipos');
    }
}
