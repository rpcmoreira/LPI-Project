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
        $tipos = [['nome' => 'admin'],
        ['nome' => 'presidente'],
        ['nome' => 'vice-presidente'],
        ['nome' => 'membro'],
        ['nome' => 'secretariado'],
        ['nome' => 'user'],
        ['nome' => 'estudante'],];

        foreach($tipos as $tipo){
            DB::table('tipo')->insert($tipo);
        }
    }
}
