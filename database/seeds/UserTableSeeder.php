<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class,5)->create();
        factory(\App\User::class,1)->create([ 'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' =>  bcrypt('secret'),
            'tipo_usuario' => 1,
            'cpf' => '02658030458',
            'remember_token' => str_random(10),]);
    }
}
