<?php

namespace App\Http\Controllers;

use App\Enums\Statuses;
use App\Models\Form;
use App\Models\UniOffers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

use function Laravel\Prompts\form;

class UniOffersController extends Controller
{
    public function create(Request $request)
    {
        $form = Form::where('id', $request->form)->first();

        foreach ($request->data as $value) {
            UniOffers::create([
                'forms_id' => $request->form,
                'name' => $value['name'],
                'quantity' => $value['quantity'],
                'excluding_vat' => $value['excluding_vat'],
                'vat' => $value['vat'],
                'gross_amount' => $value['quantity'] ,
            ]);
        }


        $form->status = Statuses::ARAJANLAT_ELFOGADASRA_VAR;
        $form->updated_at = now();
        $form->save();


        return response()->json();
    }

    public function show_offer(Request $request)
    {

        $form = Form::where('id', $request->form)->first();

        $services = UniOffers::where('forms_id', $form->id)->get();
        $pdf = Pdf::loadView('unioffer', [
            'client_name' => 'Kovács Péter',
            'event_name' => 'Éves Konferencia',
            'event_date' => '2025. november 12-15.',
            'event_location' => 'Győr Városi Egyetemi Csarnok',
            'services' => $services,
            'date' => now()->format('Y.m.d.'),
            'sender_name' => 'Söller Klaudia'
        ]);
        return $pdf->stream();
    }
}
