<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(9)->create();
  

        \App\Models\User::factory()->create([
            'name' => 'Antonio ',
            'email' => 'sistemas@anpr.org.mx',
            'password' => bcrypt('123456789'), // password
        ]);

        \App\Models\category::factory(10)
            ->hasThreads(20)
            ->create();

        \App\Models\Reply::factory(400)->create();
    }
}
