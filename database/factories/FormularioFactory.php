<?php

use Faker\Generator as Faker;

$factory->define(\App\Formulario::class, function (Faker $faker) {
    return [
        'atendimento_id' => $faker->numberBetween(1,99999999),
        'idetificacao' => $faker->numberBetween(1,3),
        'nome' => $faker->name(),
        'data_nascimento' => $faker->date(),
        'data_inicio_internacao' => $faker->date(),
        'data_fim_internacao' => $faker->date(),
        'unidade_internacao' => $faker->numberBetween(1,5),
        'andar' => $faker->numberBetween(1,10),
        'quarto' => $faker->numberBetween(1,20),
        'impediemntos' => $faker->numberBetween(1,2),

        'escolha_observacao' => $faker->text(100),
        'profissionais_observacao' => $faker->text(100),
        'atendimento_observacao' => $faker->text(100),

        'preenchido_por' => $faker->numberBetween(1,3),
        'preenchido_por_nome' => $faker->name,
        'preenchido_por_telefone' => $faker->phoneNumber,
        'preenchido_por_parentesco' => $faker->numberBetween(1,7),
        'endereco' => $faker->address,
        'telefone' => $faker->phoneNumber,
        'email' => $faker->email,
        'fator_escolha' => $faker->numberBetween(1,7),
        'indicacao_qual_empresa' => $faker->word,
        'fator_escolha_outro' => $faker->word,
        'utilizou_servico_antes' => $faker->numberBetween(1,2),
        'utilizou_servico_antes_qual' => $faker->word,
        'atp_central_agendamento' => $faker->numberBetween(1,5),
        'atp_recepcionista' => $faker->numberBetween(1,5),
        'atp_seguranca' => $faker->numberBetween(1,5),
        'atp_enfermagem' => $faker->numberBetween(1,5),
        'atp_equipe_medica' => $faker->numberBetween(1,5),
        'atp_laboratorio' => $faker->numberBetween(1,5),
        'atp_tec_imobilizacao' => $faker->numberBetween(1,5),
        'agendamento_orientacao' => $faker->numberBetween(1,5),
        'ta_central_agendamento' => $faker->numberBetween(1,5),
        'ta_recepcionista' => $faker->numberBetween(1,5),
        'ta_enfermagem' => $faker->numberBetween(1,5),
        'ta_exames' => $faker->numberBetween(1,5),
        'ta_entrega_laudo' => $faker->numberBetween(1,5),
        'ta_equipe_medica' => $faker->numberBetween(1,5),
        'ta_realizacao_exame' => $faker->numberBetween(1,5),
        'ta_administracao_medicacao' => $faker->numberBetween(1,5),
        'ta_imobilizacao_curativo' => $faker->numberBetween(1,5),
        'ta_emergencia' => $faker->numberBetween(1,5),
        'ta_internacao' => $faker->numberBetween(1,5),
        'if_estacionamento' => $faker->numberBetween(1,5),
        'if_recepcao' => $faker->numberBetween(1,5),
        'if_internacao' => $faker->numberBetween(1,5),
        'if_seguranca' => $faker->numberBetween(1,5),
        'if_sinalizacao' => $faker->numberBetween(1,5),
        'if_atendimento_solicitacoes' => $faker->numberBetween(1,5),
        'if_instalacoes_apartamento' => $faker->numberBetween(1,5),
        'if_grau_ruido' => $faker->numberBetween(1,5),
        'if_aparencia' => $faker->numberBetween(1,5),
        'if_conforto' => $faker->numberBetween(1,5),
        'if_limpeza' => $faker->numberBetween(1,5),
        'if_roupa_cama' => $faker->numberBetween(1,5),
        'if_atendimento' => $faker->numberBetween(1,5),
        'if_conveniencia' => $faker->numberBetween(1,5),
        'if_pastoral_saude' => $faker->numberBetween(1,5),
        'if_observacoes' => $faker->text(100),
        'nut_alimentos' => $faker->numberBetween(1,5),
        'nut_temperatura' => $faker->numberBetween(1,5),
        'nut_entrega_refeicao' => $faker->numberBetween(1,5),
        'nut_observacoes' => $faker->text(100),
        'em_duvidas_esclarecidas' => $faker->numberBetween(1,5),
        'em_seguranca_diagnostico' => $faker->numberBetween(1,5),
        'em_atencao' => $faker->numberBetween(1,5),
        'em_simpatia' => $faker->numberBetween(1,5),
        'em_observacoes' => $faker->text(100),
        'enf_clareza' => $faker->numberBetween(1,5),
        'enf_atendimento' => $faker->numberBetween(1,5),
        'enf_atencao' => $faker->numberBetween(1,5),
        'enf_simpatia' => $faker->numberBetween(1,5),
        'enf_grau_ruido' => $faker->numberBetween(1,5),
        'enf_observacoes' =>  $faker->text(100),
        'conclusao_observacao' =>  $faker->text(100),
        'atendimento_humanizado' => $faker->numberBetween(1,5),
        'satisfeito' => $faker->numberBetween(1,5),
        'recomendacao' => $faker->numberBetween(1,5),
        'desde_ultima_visita' => $faker->numberBetween(1,4),
        'tipo_pesquisa' => $faker->numberBetween(1,3)
    ];
});
