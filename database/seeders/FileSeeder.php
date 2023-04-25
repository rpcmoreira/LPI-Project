<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $files = [['file' => 'Formulário envio de sintese de resultados CES-HE-FFP.doc'],
        ['file' => 'Info_CES.docx'],
        ['file' => 'Parecer Estudo Clinico_DCEII.docx'],
        ['file' => 'Q250-Formulário Elaboração Pareceres CES-HE-FFP.doc'],
        ['file' => 'Q251-Formulário Submissão de Pedidos de Parecer CES-HE-FFP.doc'],
        ['file' => 'Q252-Consentimento informado para participação em investigação.docx'],
        ['file' => 'Q272-Pedido-de-Autorização-Realização-de-investigação.docx'],
        ['file' => 'Q381-Formulário-Envio-de-Sintese-de-Resultados-CES-HE-FFP.docx'],];

        foreach($files as $file){
            DB::table('files')->insert($file);
        }
    }
}
