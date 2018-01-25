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

            $table->char('unidade_internacao',1);
            $table->char('andar',2);
            $table->string('quarto');
            $table->integer('impediemntos');

            $table->integer('prenchido_por');
            $table->string('endereco');
            $table->string('telefone');
            $table->string('email');
            $table->integer('fator_escolha');
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
            $table->char('atp_tec_imobilizacao',1);
            $table->char('agendamento_orientacao',1);

            $table->char('ta_central_agendamento', 1);
            $table->char('ta_recepcionista', 1);
            $table->char('ta_enfermagem',1);
            $table->char('ta_exames',1);
            $table->char('ta_entrega_laudo',1);
            $table->char('ta_equipe_medica',1);
            $table->char('ta_realizacao_exame',1);
            $table->char('ta_administracao_medicacao',1);
            $table->char('ta_imobilizacao_curativo',1);
            $table->char('ta_emergencia',1);
            $table->char('ta_internacao',1);

            $table->char('if_estacionamento', 1);
            $table->char('if_recepcao', 1);
            $table->char('if_internacao', 1);
            $table->char('if_seguranca', 1);
            $table->char('if_sinalizacao', 1);
            $table->char('if_atendimento_solicitacoes',1);
            $table->char('if_instalacoes_apartamento',1);
            $table->char('if_grau_ruido',1);
            $table->char('if_aparencia',1);
            $table->char('if_conforto',1);
            $table->char('if_limpeza',1);
            $table->char('if_roupa_cama', 1);
            $table->char('if_atendimento', 1);
            $table->char('if_conveniencia', 1);
            $table->string('if_observacoes');



            $table->char('nut_alimentos', 1);
            $table->char('nut_temperatura', 1);
            $table->char('nut_entrega_refeicao', 1);
            $table->string('nut_observacoes');

            $table->char('em_duvidas_esclarecidas',1);
            $table->char('em_seguranca_diagnostico',1);
            $table->char('em_atencao',1);
            $table->char('em_simpatia',1);
            $table->string('em_observacoes');

            $table->char('enf_clareza',1);
            $table->char('enf_atendimento',1);
            $table->char('enf_atencao',1);
            $table->char('enf_simpatia',1);
            $table->char('enf_grau_ruido',1);
            $table->string('enf_observacoes');


            $table->char('atendimento_humanizado',1);
            $table->char('satisfeito',1);
            $table->char('recomendacao',1);

            $table->char('desde_ultima_visita',1);

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
