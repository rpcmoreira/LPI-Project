<?php

namespace Database\Seeders;
use App\Models;
use App\Models\Data;
use App\Models\projeto;
use App\Models\Tipo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/* The `class DatabaseSeeder extends Seeder` is defining a seeder class in Laravel that is responsible
for seeding the application's database with initial data. It extends the `Seeder` class provided by
Laravel and overrides the `run` method to define the data to be seeded. In this specific example, it
is creating instances of various models and calling other seeder classes to populate the database
with data. */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //]);

        //\App\Models\User::factory(10)->create();
        //*Tipo::factory()->count(7)->sequence(
        //    ['nome' => 'admin'],
        //    ['nome' => 'presidente'],
        //    ['nome' => 'vice-presidente'],
        //    ['nome' => 'membro'],
        //    ['nome' => 'secretariado'],
        //    ['nome' => 'user'],
        //    ['nome' => 'estudante'],
        //)->create();


        Data::factory()->create([
            'data' => '2023-04-25',
        ]);

        Data::factory()->create([
            'data' => '2023-04-26',
        ]);

        $this->call([
            TipoSeeder::class,
            EstudoSeeder::class,
            AreaSeeder::class,
            UserSeeder::class,
            EstadoSeeder::class,
            TipoResultadoSeeder::class,
        ]);

        projeto::factory(100)->create();
    }
}
