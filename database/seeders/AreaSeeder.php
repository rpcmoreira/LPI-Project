<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

/* The `class AreaSeeder extends Seeder` is defining a seeder class in PHP for populating the `area`
table in a database with predefined data. The `Seeder` class is a built-in class in Laravel
framework that provides a convenient way to seed the database with test data. The `run()` method is
used to execute the seeder and insert the data into the `area` table using the `DB` facade. */
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
