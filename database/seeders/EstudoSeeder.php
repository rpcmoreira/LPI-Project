<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/* The `class EstudoSeeder extends Seeder` is defining a seeder class in PHP for populating the
`estudos` table in a database with predefined data. The `Seeder` class is a built-in class in
Laravel framework that provides a convenient way to seed the database with test data. The `run()`
method is used to insert the predefined data into the `estudos` table using the `DB` facade. */
class EstudoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estudos = [['nome' => 'Académico - Doutoramento'],
        ['nome' => 'Académico - Licenciatura'],
        ['nome' => 'Académico - Mestrado'],
        ['nome' => 'Académico - Pós-Doutoramento'],
        ['nome' => 'Académico - Pós-Graduação'],
        ['nome' => 'Candidatura Bolsa de investigação'],
        ['nome' => 'Estudo - Especialista'],
        ['nome' => 'Projeto/ Estudo de investigação'],
        ['nome' => 'Protocolo Clínico']];

        foreach($estudos as $estudo){
            DB::table('estudos')->insert($estudo);
        }
    }
}
