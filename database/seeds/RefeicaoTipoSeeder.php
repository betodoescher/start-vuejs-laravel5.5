<?php

use Illuminate\Database\Seeder;

class RefeicaoTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['descricao'=>'Refeição especial', 'refeicao_classificacao_id'=> 1, 'hora_inicio_refeicao' => '11:00', 'hora_final_refeicao' => '15:00'],
            ['descricao'=>'Refeição segunda', 'refeicao_classificacao_id'=> 2, 'hora_inicio_refeicao' => '16:00', 'hora_final_refeicao' => '19:00'],
            ['descricao'=>'Refeição', 'refeicao_classificacao_id'=> 3, 'hora_inicio_refeicao' => '20:00', 'hora_final_refeicao' => '23:00'],

        ];
        DB::table('refeicao_tipos')->insert($data);
    }
}
