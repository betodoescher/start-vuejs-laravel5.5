<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormularioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formularios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idetificacao');
            $table->string('nome');
            $table->date('data_nascimento');
            $table->date('data_inicio_internacao');
            $table->date('data_fim_internacao');
            $table->integer('prenchido_por');
            $table->string('endereco');
            $table->string('telefone');
            $table->string('email');

            $table->string('fator_escolha');
            $table->string('indicacao_qual_empresa');
            $table->string('fator_escolha_outro');
            $table->char('utilizou_servico_antes',1);
            $table->string('utilizou_servico_antes_qual');


            $table->char('atp_central_agendamento', 1);
            $table->char('atp_recepcionista', 1);
            $table->char('atp_seguranca',1);
            $table->char('atp_enfermagem',1);
            $table->char('atp_equipe_medica',1);
            $table->char('atp_laboratorio',1);

            $table->char('agendamento_orientacao',1);

            $table->char('ta_central_agendamento', 1);
            $table->char('ta_recepcionista', 1);
            $table->char('ta_enfermagem',1);
            $table->char('ta_exames',1);
            $table->char('ta_entrega_laudo',1);

            $table->char('if_aparencia',1);
            $table->char('if_conforto',1);
            $table->char('if_limpeza',1);

            $table->char('atendimento_humanizado',1);
            $table->char('satisfeito',1);
            $table->char('recomendacao',1);
            $table->char('tipo_pesquisa',1);

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
        Schema::dropIfExists('formulario');
    }
}
