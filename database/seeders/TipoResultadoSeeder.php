<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoResultadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resultados = [['tipo' => 'tese'],
        ['tipo' => 'artigo'],
        ['tipo' => 'investigacao financiada']];

        foreach($resultados as $resultado){
            DB::table('tipo_resultados')->insert($resultado);
        }
    }
}
