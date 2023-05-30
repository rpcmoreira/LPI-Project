<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        ['nome' => 'Direcao Cientifica'],];

        foreach($tipos as $tipo){
            DB::table('tipo')->insert($tipo);
        }
    }
}
