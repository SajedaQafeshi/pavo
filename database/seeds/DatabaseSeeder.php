<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('users')->insert([
            'name' => 'Omar',
            'email' => 'omar@gmail.com',
            'password' => Hash::make('Omar12345'),
        ]);
    }
}
