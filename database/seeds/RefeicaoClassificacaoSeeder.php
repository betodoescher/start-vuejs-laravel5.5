<?php

use Illuminate\Database\Seeder;

class RefeicaoClassificacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['descricao'=>'Café da Manhã'],
            ['descricao'=>'Almoço'],
            ['descricao'=>'Café da Tarde'],
            ['descricao'=>'Jantar'],
            ['descricao'=>'Ceia'],
        ];

        DB::table('refeicao_classificacoes')->insert($data);
    }
}
