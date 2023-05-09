<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\projeto>
 */
class projetoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
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

        $coor = array(1,2,3,4,5,6,7);
        $r_coor = array_rand($coor);
        $rand_coor = $coor[$r_coor]; 

        $nome = array('Projeto Comissao de Etica', 'Projeto de Mestrado', 'Projeto Hospital',
        'Projeto Viaturas', 'Projeto Robo', 'Operacao Forcada', 'Operacao a Realizar');
        $r_nome = array_rand($nome);
        $rand_nome = $nome[$r_nome]; 

        return [
            'nome' => $rand_nome,
            'proponente_id' => 2,
            'proponente_id' => $rand_coor,
            'objetivo' =>'lorem ipsum',
            'metodos' =>'lorem ipsum',
            'data_id' => 1,
            'data_final_id' => 2,
            'area_id' =>$rand_area,
            'estudo_id' =>$rand_estudo,
            'estado_id' =>$rand_estado,
        ];
    }
}
