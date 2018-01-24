<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    protected $fillable = [
        'id',
        'idetificacao',
        'nome',
        'data_nascimento',
        'data_inicio_internacao',
        'data_fim_internacao',
        'prenchido_por',
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

        'agendamento_orientacao',

        'ta_central_agendamento', 
        'ta_recepcionista', 
        'ta_enfermagem',
        'ta_exames',
        'ta_entrega_laudo',

        'if_aparencia',
        'if_conforto',
        'if_limpeza',

        'atendimento_humanizado',
        'satisfeito',
        'recomendacao',
        'tipo_pesquisa',
    ];
}
