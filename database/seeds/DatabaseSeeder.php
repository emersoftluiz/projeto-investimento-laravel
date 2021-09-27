<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'cpf' => '887654321',
          'name' => 'João da Silva',
          'phone' => '9999-9999',
          'birth' => '1985-02-01',
          'gender' => 'M',
          'notes' => '',
          'email' => 'teste2@teste.com.br',
          'password' => env('PASSWORD_HASH') ? bcrypt('123456') : '123456'
        ]);
    }
}
