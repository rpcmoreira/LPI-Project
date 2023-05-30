<?php

namespace App\Exports;

use App\Models\projeto;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProjetoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Projeto::join('users as prop', 'projetos.proponente_id', '=', 'prop.id')
            ->join('users', 'projetos.coordenador_id', '=', 'users.id')
            ->join('data as data_i', 'projetos.data_id', '=', 'data_i.id')
            ->join('data as data_f', 'projetos.data_final_id', '=', 'data_f.id')
            ->join('area', 'projetos.area_id', '=', 'area.id')
            ->join('estudos', 'projetos.estudo_id', '=', 'estudos.id')
            ->join('estado', 'projetos.estado_id', '=', 'estado.id')
            ->select(
                'projetos.id',
                'projetos.nome',
                'prop.nome as proponente_nome',
                'users.nome as coordenador_nome',
                'projetos.objetivo',
                'projetos.metodos',
                'data_i.data as data_inicio',
                'data_f.data as data_final',
                'area.nome as area_nome',
                'estudos.nome as estudo_nome',
                'estado.estado',
                'projetos.aprovacao'
            )
            ->get();
    }
}
