<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RefeicaoClassificacaoSeeder::class);
        $this->call(RefeicaoTipoSeeder::class);
        $this->call(BalancaSeeder::class);
    }
}
