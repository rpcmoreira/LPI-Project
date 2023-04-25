<?php

namespace Database\Seeders;
use App\Models;
use App\Models\Data;
use App\Models\projeto;
use App\Models\Tipo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //]);

        //\App\Models\User::factory(10)->create();
        //*Tipo::factory()->count(7)->sequence(
        //    ['nome' => 'admin'],
        //    ['nome' => 'presidente'],
        //    ['nome' => 'vice-presidente'],
        //    ['nome' => 'membro'],
        //    ['nome' => 'secretariado'],
        //    ['nome' => 'user'],
        //    ['nome' => 'estudante'],
        //)->create();


        Data::factory()->create([
            'data' => '2023-04-25',
        ]);

        Data::factory()->create([
            'data' => '2023-04-26',
        ]);

        $this->call([
            TipoSeeder::class,
            EstudoSeeder::class,
            AreaSeeder::class,
            UserSeeder::class,
            EstadoSeeder::class,
            TipoResultadoSeeder::class,
        ]);

        projeto::factory()->create([
            'nome' => 'Site',
            'proponente_id' =>'1',
            'objetivo' =>'lorem ipsum',
            'metodos' =>'lorem ipsum',
            'data_id' =>'1',
            'data_final_id' =>'2',
            'area_id' =>'2',
            'estudo_id' =>'3',
            'estado_id' => '1',
        ]);

        projeto::factory()->create([
            'nome' =>'Projeto Secretariado',
            'proponente_id' =>'2',
            'objetivo' =>'lorem ipsum',
            'metodos' =>'lorem ipsum',
            'data_id' =>'1',
            'data_final_id' =>'2',
            'area_id' =>'4',
            'estudo_id' =>'2',
            'estado_id' => '2',
        ]);

        projeto::factory()->create([
            'nome' =>'Projeto Secretariado',
            'proponente_id' =>'2',
            'objetivo' =>'lorem ipsum',
            'metodos' =>'lorem ipsum',
            'data_id' =>'1',
            'data_final_id' =>'2',
            'area_id' =>'4',
            'estudo_id' =>'2',
            'estado_id' => '2',
        ]);

        projeto::factory()->create([
            'nome' =>'Projeto Comissao Etica',
            'proponente_id' =>'4',
            'objetivo' =>'lorem ipsum',
            'metodos' =>'lorem ipsum',
            'data_id' =>'1',
            'data_final_id' =>'2',
            'area_id' =>'1',
            'estudo_id' =>'5',
            'estado_id' => '5',
        ]);

        projeto::factory()->create([
            'nome' =>'Projeto Comissao Etica 2',
            'proponente_id' =>'4',
            'objetivo' =>'lorem ipsum',
            'metodos' =>'lorem ipsum',
            'data_id' =>'1',
            'data_final_id' =>'2',
            'area_id' =>'1',
            'estudo_id' =>'5',
            'estado_id' => '5',
        ]);

        projeto::factory()->create([
            'nome' =>'Projeto Comissao Etica 4',
            'proponente_id' =>'4',
            'objetivo' =>'lorem ipsum',
            'metodos' =>'lorem ipsum',
            'data_id' =>'1',
            'data_final_id' =>'2',
            'area_id' =>'1',
            'estudo_id' =>'5',
            'estado_id' => '5',
        ]);

        projeto::factory()->create([
            'nome' =>'Projeto Teste teste',
            'proponente_id' =>'4',
            'objetivo' =>'lorem ipsum',
            'metodos' =>'lorem ipsum',
            'data_id' =>'1',
            'data_final_id' =>'2',
            'area_id' =>'1',
            'estudo_id' =>'5',
            'estado_id' => '3',
        ]);
        projeto::factory()->create([
            'nome' =>'Projeto Teste teste 2',
            'proponente_id' =>'4',
            'objetivo' =>'lorem ipsum',
            'metodos' =>'lorem ipsum',
            'data_id' =>'1',
            'data_final_id' =>'2',
            'area_id' =>'1',
            'estudo_id' =>'5',
            'estado_id' => '3',
        ]);

        projeto::factory()->create([
            'nome' =>'Projeto Comissao Etica 1',
            'proponente_id' =>'4',
            'objetivo' =>'lorem ipsum',
            'metodos' =>'lorem ipsum',
            'data_id' =>'1',
            'data_final_id' =>'2',
            'area_id' =>'1',
            'estudo_id' =>'5',
            'estado_id' => '4',
        ]);
        projeto::factory()->create([
            'nome' =>'Projeto Comissao Etica 2',
            'proponente_id' =>'4',
            'objetivo' =>'lorem ipsum',
            'metodos' =>'lorem ipsum',
            'data_id' =>'1',
            'data_final_id' =>'2',
            'area_id' =>'1',
            'estudo_id' =>'5',
            'estado_id' => '4',
        ]);
        projeto::factory()->create([
            'nome' =>'Projeto Comissao Etica 3',
            'proponente_id' =>'4',
            'objetivo' =>'lorem ipsum',
            'metodos' =>'lorem ipsum',
            'data_id' =>'1',
            'data_final_id' =>'2',
            'area_id' =>'1',
            'estudo_id' =>'5',
            'estado_id' => '4',
        ]);
        projeto::factory()->create([
            'nome' =>'Projeto Comissao Etica 4',
            'proponente_id' =>'4',
            'objetivo' =>'lorem ipsum',
            'metodos' =>'lorem ipsum',
            'data_id' =>'1',
            'data_final_id' =>'2',
            'area_id' =>'1',
            'estudo_id' =>'5',
            'estado_id' => '4',
        ]);
    }
}
