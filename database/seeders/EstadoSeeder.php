<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/* The `class EstadoSeeder extends Seeder` is defining a seeder class in PHP that will be used to
populate the `estado` table in the database with predefined data. The `Seeder` class is a built-in
class in Laravel that provides a convenient way to seed the database with test data. The
`EstadoSeeder` class extends the `Seeder` class and overrides its `run()` method to define the logic
for populating the `estado` table with the predefined data. */
class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estados = [['estado' => 'Pendente'],
        ['estado' => 'Em Curso'],
        ['estado' => 'Finalizado'],
        ['estado' => 'A Espera de Aprovação'],
        ['estado' => 'Falta Informação'],
        ['estado' => 'Em Análise pela Direção Científica'],
        ['estado' => 'Em Fase de Escolha do Relator'],
        ['estado' => 'Cancelado']];

        foreach($estados as $estado){
            DB::table('estado')->insert($estado);
        }
    }
}
