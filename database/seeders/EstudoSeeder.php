<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
