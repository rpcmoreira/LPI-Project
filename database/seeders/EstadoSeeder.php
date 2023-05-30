<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        ['estado' => 'Em Fase de Escolha do Relator']];

        foreach($estados as $estado){
            DB::table('estado')->insert($estado);
        }
    }
}
