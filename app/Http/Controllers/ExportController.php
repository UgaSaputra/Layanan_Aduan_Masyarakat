<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\MenajemenAdmin;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function exportPdf(Request $request)
    {
        $admin = MenajemenAdmin::all(); 

        $html = view('Admin.DataAdmin', compact('admin'))->render();

        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        return $dompdf->stream('data-admin.pdf', ['Attachment' => true]);
    }
}
