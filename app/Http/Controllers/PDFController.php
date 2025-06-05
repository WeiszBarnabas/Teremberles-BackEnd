<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF($id)
    {
        $data = Form::where('id', $id)->first()->toArray();
        $pdf = Pdf::loadView('engedelyezo', ['form'=>$data]);
        return $pdf->download('document.pdf');
    }
}
