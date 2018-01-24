<?php

use Faker\Generator as Faker;

$factory->define(\App\Formulario::class, function (Faker $faker) {
    return [
        'idetificacao' => $faker->numberBetween(1,3),
        'nome' => $faker->name(),
        'data_nascimento' => $faker->date(),
        'data_inicio_internacao' => $faker->date(),
        'data_fim_internacao' => $faker->date(),
        'prenchido_por' => $faker->numberBetween(1,3),
        'endereco' => $faker->address,
        'telefone' => $faker->phoneNumber,
        'email' => $faker->email,
        'fator_escolha' => $faker->numberBetween(1,6),
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
        'agendamento_orientacao' => $faker->numberBetween(1,5),
        'ta_central_agendamento' => $faker->numberBetween(1,5),
        'ta_recepcionista' => $faker->numberBetween(1,5),
        'ta_enfermagem' => $faker->numberBetween(1,5),
        'ta_exames' => $faker->numberBetween(1,5),
        'ta_entrega_laudo' => $faker->numberBetween(1,5),
        'if_aparencia' => $faker->numberBetween(1,5),
        'if_conforto' => $faker->numberBetween(1,5),
        'if_limpeza' => $faker->numberBetween(1,5),
        'atendimento_humanizado' => $faker->numberBetween(1,5),
        'satisfeito' => $faker->numberBetween(1,5),
        'recomendacao' => $faker->numberBetween(1,5),
        'tipo_pesquisa' => $faker->numberBetween(1,3)
    ];
});
