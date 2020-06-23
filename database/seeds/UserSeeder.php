<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create();

        // User::create([
        //     'name' => 'Nícollas Silva',
        //     'email' => 'lyod.hp@gmail.com',
        //     'password' => bcrypt('123456')
        // ]);
    }
}
