<?php

namespace Database\Seeders;
use App\Models;
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

        $this->call([
            TipoSeeder::class,
            EstudoSeeder::class,
            AreaSeeder::class,
            UserSeeder::class,
        ]);
    }
}
