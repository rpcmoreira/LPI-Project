<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/* `class projetoFactory extends Factory` is defining a factory class for the `projeto` model in
Laravel. The `extends Factory` indicates that it is extending the base factory class provided by
Laravel. This factory class is used to generate fake data for testing and seeding the database. */
class projetoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    /**
     * The function generates a random array of project information including a name, proponent ID,
     * objective, methods, dates, area, study, state, and approval status.
     * 
     * @return array An array with keys 'nome', 'proponente_id', 'objetivo', 'metodos', 'data_id',
     * 'data_final_id', 'area_id', 'estudo_id', 'estado_id', and 'aprovacao'. The values for each key
     * are randomly selected from predefined arrays.
     */
    public function definition(): array
    {
        $estado = array(1,2,3,4,5);
        $r_estado = array_rand($estado);  
        $rand_estado = $estado[$r_estado]; 

        $estudo = array(1,2,3,4,5,6,7,8,9);
        $r_estudo = array_rand($estudo);
        $rand_estudo = $estudo[$r_estudo];   

        $area = array(1,2,3,4,5,6,7,8,9,10);
        $r_area = array_rand($area);
        $rand_area = $area[$r_area]; 

        $coor = array(3,4,5,6,7,8,9);
        $r_coor = array_rand($coor);
        $rand_coor = $coor[$r_coor]; 

        $nome = array('Projeto Comissao de Etica', 'Projeto de Mestrado', 'Projeto Hospital',
        'Projeto Viaturas', 'Projeto Robo', 'Operacao Forcada', 'Operacao a Realizar');
        $r_nome = array_rand($nome);
        $rand_nome = $nome[$r_nome]; 

        return [
            'nome' => $rand_nome,
            'proponente_id' => $rand_coor,
            'objetivo' =>'lorem ipsum',
            'metodos' =>'lorem ipsum',
            'data_id' => 1,
            'data_final_id' => 2,
            'area_id' =>$rand_area,
            'estudo_id' =>$rand_estudo,
            'estado_id' =>$rand_estado,
            'aprovacao' => 'Aprovado',
        ];
    }
}
