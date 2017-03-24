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
        // $this->call(UsersTableSeeder::class);
        factory(App\Tipo::class, 10)->create();
        factory(App\Projeto::class, 10)->create();
        factory(App\Local::class, 10)->create();
        factory(App\Patrimonio::class, 10)->create();
    }
}
