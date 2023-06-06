<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/* `class TipoSeeder extends Seeder` is defining a class called `TipoSeeder` that extends the `Seeder`
class. This class is used to seed the database with data for the `tipo` table. The `run` method is
defined to insert the data into the `tipo` table using the `DB` facade. */
class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [['nome' => 'Admin'],
        ['nome' => 'Presidente'],
        ['nome' => 'Vice-presidente'],
        ['nome' => 'Coordenador'],
        ['nome' => 'Membro'],
        ['nome' => 'Secretariado'],
        ['nome' => 'User'],
        ['nome' => 'Direcao Cientifica'],
        ['nome' => 'Não Definido'],];

        foreach($tipos as $tipo){
            DB::table('tipo')->insert($tipo);
        }
    }
}
