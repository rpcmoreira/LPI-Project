<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = [['nome' => 'Análises Clínicas'],
        ['nome' => 'Audiologia'],
        ['nome' => 'Ciências Farmacêuticas'],
        ['nome' => 'Ciências da Informação'],
        ['nome' => 'Enfermagem'],
        ['nome' => 'Fisioterapia'],
        ['nome' => 'Medicina'],
        ['nome' => 'Medicina Dentária'],
        ['nome' => 'Nutrição'],
        ['nome' => 'Psicologia'],
        ['nome' => 'Terapêutica da Fala']];

        foreach($areas as $area){
            DB::table('area')->insert($area);
        }
    }
}
