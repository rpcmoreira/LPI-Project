<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mikehaertl\pdftk\Pdf;

class PdfController extends Controller {
    public function generateFilled_q250_Pdf(Request $request) {
        // Get form data from the request
        $formData = $request->all();

        // Unset the CSRF token from the form data
        unset($formData['_token']);

        // Convert checkbox values from '1' to 'Sim' for checked and 'Off' for unchecked
        $checkboxFields = [
            'objetivos_estudo', 'tipo_investigacao', 'contexto_estudo', 'participantes_estudo', 'acesso_participantes',
            'procedimentos_consentimento', 'formulario_consentimento',
            'dados_sensiveis', 'procedimentos_descritos', 'instrumentos_descritos', 'instrumentos_anexados', 'garantia_confidencialidade',
        ];
        foreach ($checkboxFields as $field) {
            $formData[$field] = isset($formData[$field]) && $formData[$field] == '1' ? 'Sim' : 'Off';
        }

        // Process radio buttons - set 'Group7' to the value of 'parecer_relator' in your form data
        if (isset($formData['parecer_relator'])) {
            $formData['Group7'] = $formData['parecer_relator'];
        } else {
            $formData['Group7'] = 'Off';  // Or any default value required by your PDF
        }
        unset($formData['parecer_relator']);  // Remove original 'parecer_relator' field from formData

        // Load the PDF template
        $templatePath = storage_path('app/forms_editaveis/q250.pdf');
        $pdf = new Pdf($templatePath);

        // Fill in the form data using field names as placeholders
        $pdf->fillForm($formData)->flatten();

        // Save the filled PDF file
        $outputPath = storage_path('app/forms_preenchidos/q250_preenchido.pdf');
        $pdf->saveAs($outputPath);

        // Return the filled PDF file as a download
        return response()->download($outputPath, 'q250_preenchido.pdf')->deleteFileAfterSend(true);
    }

    public function generateFilled_q251_Pdf(Request $request) {
        // Get form data from the request
        $formData = $request->all();

        // Unset the CSRF token from the form data
        unset($formData['_token']);

        // Set the checkbox 'yes' value
        // Note: In the PDF form, checkbox value should be set to 'Sim' if checked, and 'Off' if not checked
        $formData['yes'] = (isset($formData['vulneravel']) && $formData['vulneravel'] == '1') ? 'Sim' : 'Off';

        // Set the radio button group 'Group1' value
        // Note: In the PDF form, radio button value should be set to either 'sim' or 'nao', depending on which one is selected
        $formData['Group1'] = isset($formData['consentimento']) ? $formData['consentimento'] : 'Off';

        // Load the PDF template
        $templatePath = storage_path('app/forms_editaveis/q251.pdf');
        $pdf = new Pdf($templatePath);

        // Fill in the form data using field names as placeholders
        $pdf->fillForm($formData)->flatten();

        // Save the filled PDF file
        $outputPath = storage_path('app/forms_preenchidos/q251_preenchido.pdf');
        $pdf->saveAs($outputPath);

        // Return the filled PDF file as a download
        return response()->download($outputPath, 'q251_preenchido.pdf')->deleteFileAfterSend(true);
    }

    public function generateFilled_q252_Pdf(Request $request) {
        // Get form data from the request 
        $formData = $request->all();

        // Unset the CSRF token from the form data 
        unset($formData['_token']);

        // The text fields from the "q252.blade.php" file
        $textFields = [
            'titulo',
            'enquadramento',
            'explicacao',
            'condicoes',
            'confidencialidade',
            'agradecimentos',
        ];

        // If a text field is not set, set it to 'Off'
        foreach ($textFields as $field) {
            $formData[$field] = $formData[$field] ?? 'Off';
        }

        // Load the PDF template
        $templatePath = storage_path('app/forms_editaveis/q252.pdf');
        $pdf = new Pdf($templatePath);

        // Fill in the form data using field names as placeholders
        $pdf->fillForm($formData)->flatten();

        // Save the filled PDF file
        $outputPath = storage_path('app/forms_preenchidos/q252_preenchido.pdf');
        $pdf->saveAs($outputPath);

        // Return the filled PDF file as a download
        return response()->download($outputPath, 'q252_preenchido.pdf')->deleteFileAfterSend(true);
    }
}
