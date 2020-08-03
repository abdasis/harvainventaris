<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        return User::create([
            'name' => 'Abd. Asis',
            'email' => 'id.abdasis@gmail.com',
            'password' => Hash::make('rahasia'),
        ]);
    }
}
