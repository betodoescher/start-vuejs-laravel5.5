<?php

use Illuminate\Database\Seeder;

class FormularioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(\App\Formulario::class,30)->create();

    }
}
