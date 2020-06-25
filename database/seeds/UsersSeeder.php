<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Daniel de Assis Ferreira',
                'register' => '123456789',
                'password' => Hash::make('123456789'),
                'admin' => true,
            ],
            [
                'name' => 'João Pinheiro Souza',
                'register' => '987654321',
                'password' => Hash::make('987654321'),
                'admin' => false,
            ]
        ]);
    }
}
