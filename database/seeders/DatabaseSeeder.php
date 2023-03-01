<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Usuario;
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
        // User::factory(10)->create();
        Usuario::factory(10)->create();
        Categoria::factory(3)->create();
    }
}
