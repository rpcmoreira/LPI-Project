<?php

namespace App\Exports;

use App\Models\projeto;
use Maatwebsite\Excel\Concerns\FromCollection;


/* The `class ProjetoExport` is implementing the `FromCollection` interface from the
`Maatwebsite\Excel\Concerns` namespace. This means that it is defining a class that can be used to
export data to an Excel file, and it will use a collection of data as the source for the export. The
`FromCollection` interface requires the implementation of a `collection()` method that returns the
data to be exported. In this case, the `collection()` method is joining multiple tables and
selecting specific columns to create a collection of data to be exported. */
class ProjetoExport implements FromCollection
{

    /**
     * This function retrieves a collection of data from various database tables and returns it as a
     * result.
     * 
     * @return a collection of data from multiple tables joined together. The selected columns include
     * project information such as id, name, objective, methods, start and end dates, area, study,
     * approval status, and the names of the proponent, coordinator, and relator.
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
            ->join('users as relator', 'projetos.relator_id', '=', 'relator.id')
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
                'projetos.aprovacao',
                'relator.nome as relator_nome'
            )
            ->get();
    }
}
