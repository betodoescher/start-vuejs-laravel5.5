<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    protected $fillable = [
        'id',
        'atendimento_id',
        'idetificacao',
        'nome',
        'data_nascimento',
        'data_inicio_internacao',
        'data_fim_internacao',

        'escolha_observacao',
        'profissionais_observacao',
        'atendimento_observacao',

        'unidade_internacao',
        'andar',
        'quarto',
        'impediemntos',

        'preenchido_por',
        'preenchido_por_nome',
        'preenchido_por_telefone',
        'preenchido_por_parentesco',

        'endereco',
        'telefone',
        'email',
        'fator_escolha',
        'indicacao_qual_empresa',
        'fator_escolha_outro',
        'utilizou_servico_antes',
        'utilizou_servico_antes_qual',

        'atp_central_agendamento',
        'atp_recepcionista',
        'atp_seguranca',
        'atp_enfermagem',
        'atp_equipe_medica',
        'atp_laboratorio',
        'atp_tec_imobilizacao',
        'agendamento_orientacao',

        'ta_central_agendamento',
        'ta_recepcionista',
        'ta_enfermagem',
        'ta_exames',
        'ta_entrega_laudo',
        'ta_equipe_medica',
        'ta_realizacao_exame',
        'ta_administracao_medicacao',
        'ta_imobilizacao_curativo',
        'ta_emergencia',
        'ta_internacao',

        'if_estacionamento',
        'if_recepcao',
        'if_internacao',
        'if_seguranca',
        'if_sinalizacao',
        'if_atendimento_solicitacoes',
        'if_instalacoes_apartamento',
        'if_grau_ruido',
        'if_aparencia',
        'if_conforto',
        'if_limpeza',
        'if_roupa_cama',
        'if_atendimento',
        'if_conveniencia',
        'if_pastoral_saude',
        'if_observacoes',

        'nut_alimentos',
        'nut_temperatura',
        'nut_entrega_refeicao',
        'nut_observacoes',

        'em_duvidas_esclarecidas',
        'em_seguranca_diagnostico',
        'em_atencao',
        'em_simpatia',
        'em_observacoes',

        'enf_clareza',
        'enf_atendimento',
        'enf_atencao',
        'enf_simpatia',
        'enf_grau_ruido',
        'enf_observacoes',

        'atendimento_humanizado',
        'satisfeito',
        'recomendacao',
        'conclusao_observacao',

        'desde_ultima_visita',

        'tipo_pesquisa',

    ];
}
