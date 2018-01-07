<?php

use Illuminate\Database\Seeder;

class BalancaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['descricao'=>'Balanca 1', 'porta'=> 'COM1', 'velocidade_porta' => '4800', 'bits_dados' => '1', 'bits_parada' => '1', 'paridade' => 2, 'bloqueada' => 'S'],
            ['descricao'=>'Balanca 2', 'porta'=> 'COM4', 'velocidade_porta' => '3600', 'bits_dados' => '2', 'bits_parada' => '1', 'paridade' => 1, 'bloqueada' => 'N'],
            ['descricao'=>'Balanca 3', 'porta'=> 'COM5', 'velocidade_porta' => '2500', 'bits_dados' => '1', 'bits_parada' => '2', 'paridade' => 2, 'bloqueada' => 'N'],


        ];
        DB::table('balancas')->insert($data);
    }
}
