<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use PDF;
class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        $data = Form::where('id', $request->id)->first()->toArray();
        $pdf = PDF::loadView('engedelyezo', ['form'=>$data]);
        return $pdf->download('document.pdf');
    }
}
