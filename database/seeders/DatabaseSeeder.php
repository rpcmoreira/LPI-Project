<?php

namespace Database\Seeders;
use App\Models;
use App\Models\Data;
use App\Models\projeto;
use App\Models\Tipo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        //projeto::factory(100)->create();
    }
}
