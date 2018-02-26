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
            $table->integer('idetificacao')->nullable()->nullable();
            $table->integer('atendimento_id')->nullable()->nullable();
            $table->string('nome')->nullable()->nullable();
            $table->date('data_nascimento')->nullable()->nullable();
            $table->date('data_inicio_internacao')->nullable()->nullable();
            $table->date('data_fim_internacao')->nullable()->nullable();

            $table->char('unidade_internacao',1)->nullable()->nullable();
            $table->char('andar',2)->nullable()->nullable();
            $table->string('quarto')->nullable()->nullable();
            $table->integer('impediemntos')->nullable();

            $table->string('escolha_observacao')->nullable();
            $table->string('profissionais_observacao')->nullable();
            $table->string('atendimento_observacao')->nullable();


            $table->integer('preenchido_por')->nullable();
            $table->string('preenchido_por_nome')->nullable();
            $table->string('preenchido_por_telefone')->nullable();
            $table->string('preenchido_por_parentesco')->nullable();
            
            $table->string('endereco')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->char('fator_escolha', 1)->nullable();
            $table->string('indicacao_qual_empresa')->nullable();
            $table->string('fator_escolha_outro')->nullable();
            $table->char('utilizou_servico_antes',1)->nullable();
            $table->string('utilizou_servico_antes_qual')->nullable();

            // ATENÇÃO INTERESSE DOS PROFISSIONAIS
            $table->char('atp_central_agendamento', 1)->nullable();
            $table->char('atp_recepcionista', 1)->nullable();
            $table->char('atp_seguranca',1)->nullable();
            $table->char('atp_enfermagem',1)->nullable();
            $table->char('atp_equipe_medica',1)->nullable();
            $table->char('atp_laboratorio',1)->nullable();
            $table->char('atp_tec_imobilizacao',1)->nullable();
            $table->char('agendamento_orientacao',1)->nullable();

            // TEMPO DE ATENDIMENTO
            $table->char('ta_central_agendamento', 1)->nullable();
            $table->char('ta_recepcionista', 1)->nullable();
            $table->char('ta_enfermagem',1)->nullable();
            $table->char('ta_exames',1)->nullable();
            $table->char('ta_entrega_laudo',1)->nullable();
            $table->char('ta_equipe_medica',1)->nullable();
            $table->char('ta_realizacao_exame',1)->nullable();
            $table->char('ta_administracao_medicacao',1)->nullable();
            $table->char('ta_imobilizacao_curativo',1)->nullable();
            $table->char('ta_emergencia',1)->nullable();
            $table->char('ta_internacao',1)->nullable();

            // INSTALÇÕES FISICAS
            $table->char('if_estacionamento', 1)->nullable();
            $table->char('if_recepcao', 1)->nullable();
            $table->char('if_internacao', 1)->nullable();
            $table->char('if_seguranca', 1)->nullable();
            $table->char('if_sinalizacao', 1)->nullable();
            $table->char('if_atendimento_solicitacoes',1)->nullable();
            $table->char('if_instalacoes_apartamento',1)->nullable();
            $table->char('if_grau_ruido',1)->nullable();
            $table->char('if_aparencia',1)->nullable();
            $table->char('if_conforto',1)->nullable();
            $table->char('if_limpeza',1)->nullable();
            $table->char('if_roupa_cama', 1)->nullable();
            $table->char('if_atendimento', 1)->nullable();
            $table->char('if_conveniencia', 1)->nullable();
            $table->char('if_pastoral_saude', 1)->nullable();
            $table->string('if_observacoes')->nullable();

            // NUTRIÇÃO
            $table->char('nut_alimentos', 1)->nullable();
            $table->char('nut_temperatura', 1)->nullable();
            $table->char('nut_entrega_refeicao', 1)->nullable();
            $table->string('nut_observacoes')->nullable();

            // EQUIPE MÉDICA
            $table->char('em_duvidas_esclarecidas',1)->nullable();
            $table->char('em_seguranca_diagnostico',1)->nullable();
            $table->char('em_atencao',1)->nullable();
            $table->char('em_simpatia',1)->nullable();
            $table->string('em_observacoes')->nullable();

            // ENFERMARIA
            $table->char('enf_clareza',1)->nullable();
            $table->char('enf_atendimento',1)->nullable();
            $table->char('enf_atencao',1)->nullable();
            $table->char('enf_simpatia',1)->nullable();
            $table->char('enf_grau_ruido',1)->nullable();
            $table->string('enf_observacoes')->nullable();

            // CONCLUSÃO
            $table->char('atendimento_humanizado',1)->nullable();
            $table->char('satisfeito',1)->nullable();
            $table->char('recomendacao',1)->nullable();

            $table->char('desde_ultima_visita',1)->nullable();

            $table->char('tipo_pesquisa',1)->nullable();

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
