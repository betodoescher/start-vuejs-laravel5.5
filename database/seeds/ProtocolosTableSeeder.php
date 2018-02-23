<?php

use Illuminate\Database\Seeder;

class ProtocolosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Protocolo::class,30)->create();
    }
}
