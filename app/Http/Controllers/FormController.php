<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Enums\Statuses;
use App\Mail\RejectEmail;
use App\Models\Document;
use App\Models\DocumentTypes;
use App\Models\FamulusOffers;
use App\Models\Form;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PhpOffice\PhpWord\TemplateProcessor;


use function Pest\Laravel\json;

class FormController extends Controller
{
    public function createForm(Request $request)
    {
        try {
            $data = $request->all();

            $formData = [
                'event_name' => $data['eventDetails']['name'],
                'event_description' => $data['eventDetails']['description'],
                'event_place' => $data['eventDetails']['place'],
                'event_address' => $data['eventDetails']['address'],
                'event_type' => $data['eventType'],
                'event_classification' => $data['eventClassification'],
                'start_date' => $data['timing']['startDate'],
                'start_time' => $data['timing']['startTime'],
                'end_date' => $data['timing']['endDate'],
                'end_time' => $data['timing']['endTime'],
                'participants' => $data['specifics']['participants'],
                'press_public' => $data['specifics']['pressPublic'],
                'nature' => $data['specifics']['nature'],
                'program_plan' => $data['specifics']['programPlan'],
                'venue_setup' => $data['specifics']['venueSetup'],
                'accommodation_needed' => $data['logistics']['accommodationNeeded'],
                'accommodation_count' => $data['logistics']['accommodationCount'],
                'parking_needed' => $data['logistics']['parkingNeeded'],
                'parking_details' => $data['logistics']['parkingDetails'],
                'waste_generated' => $data['logistics']['wasteGenerated'],
                'waste_disposal' => $data['logistics']['wasteDisposal'],
                'waste_handler' => $data['logistics']['wasteHandler'],
                'internet_needed' => $data['logistics']['internetNeeded'],
                'tech_support_needed' => $data['logistics']['techSupportNeeded'],
                'tech_equipment' => $data['logistics']['techEquipment'],
                'fire_hazard' => $data['safetyCompliance']['fireHazard'],
                'fire_hazard_description' => $data['safetyCompliance']['fireHazardDescription'],
                'activities' => json_encode($data['safetyCompliance']['activities']),
                'chemical_usage' => $data['safetyCompliance']['chemicalUsage'],
                'chemical_description' => $data['safetyCompliance']['chemicalDescription'],
                'decorations' => $data['safetyCompliance']['decorations'],
                'organizer_name' => $data['organizerDetails']['name'],
                'organizer_phone' => $data['organizerDetails']['phone'],
                'organizer_email' => $data['organizerDetails']['email'],
                'organizer_address' => $data['organizerDetails']['address'],
                'additional_organizer' => $data['organizerDetails']['additionalOrganizer'],
                'additional_organizer_name' => $data['organizerDetails']['additionalOrganizerDetails']['name'],
                'additional_organizer_neptun_code' => $data['organizerDetails']['additionalOrganizerDetails']['neptunCode'],
                'additional_organizer_phone' => $data['organizerDetails']['additionalOrganizerDetails']['phone'],
                'additional_organizer_email' => $data['organizerDetails']['additionalOrganizerDetails']['email'],
                'additional_organizer_address' => $data['organizerDetails']['additionalOrganizerDetails']['address'],
                'client_name' => $data['clientDetails']['name'],
                'client_address' => $data['clientDetails']['address'],
                'client_tax_number' => $data['clientDetails']['taxNumber'],
                'client_phone' => $data['clientDetails']['phone'],
                'client_email' => $data['clientDetails']['email'],
                'data_protection' => $data['agreements']['dataProtection'],
                'event_regulations' => $data['agreements']['eventRegulations'],
                'recording_tools' => $data['additionalRequirements']['recordingTools'],
                'catering_type' => json_encode($data['additionalRequirements']['cateringType']),
                'construction_needed' => $data['additionalRequirements']['constructionNeeded'],
                'construction_start_date' => $data['additionalRequirements']['constructionDates']['startDate'],
                'construction_start_time' => $data['additionalRequirements']['constructionDates']['startTime'],
                'construction_end_date' => $data['additionalRequirements']['constructionDates']['endDate'],
                'construction_end_time' => $data['additionalRequirements']['constructionDates']['endTime'],
                'mechanical_equipment' => json_encode($data['additionalRequirements']['mechanicalEquipment']),
                'mechanical_other_tool' => $data['additionalRequirements']['mechanicalOtherTool'],
                'electrical_needed' => json_encode($data['additionalRequirements']['electricalNeeded']),
                'power_cabinet' => $data['additionalRequirements']['powerCabinet'],
                'power_demand' => $data['additionalRequirements']['powerDemand'],
                'subcontractors' => $data['additionalRequirements']['subcontractors'],
                'event_notification_form' => $data['fileUploads']['eventNotificationForm'],
                'venue_layout' => $data['fileUploads']['venueLayout'],
            ];

            $form = Form::create($formData);

            return response()->json([
                'message' => 'Form successfully created',
                'form' => $form->id,
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Database error occurred',
                'error' => $e->getMessage(),
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An unexpected error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getAll()
    {
        $allForms = Form::orderBy('created_at', 'desc')->get();

        return response()->json(['data' => $allForms]);
    }

    public function getFormData($search = '')
    {
        $query = $this->selectFormByRole(Auth::user()->role);

        if ($search == '') {
            $query->where('status', '!=', Statuses::ELUTASITVA);
        }

        if (Auth::user()->role == 2) {
            $query->where('status', Statuses::UF_ARAJANLATRA_VAR);
        }

        if (Auth::user()->role == 3) {
            $query->where('status', Statuses::SZERZODES_ATTNEZESRE_VAR);
        }

        if (Auth::user()->role == 4) {
            $query->where('status', Statuses::EGYETEMI_ALAIRASRA_VAR);
        }

        if ($search != '') {
            $query->where(function ($q) use ($search) {
                $q->whereRaw('LOWER(event_name) LIKE ?', ['%'.strtolower($search).'%'])
                    ->orWhereRaw('LOWER(event_address) LIKE ?', ['%'.strtolower($search).'%'])
                    ->orWhereRaw('LOWER(status) LIKE ?', ['%'.strtolower($search).'%']);
            });
        }

        $allForms = $query->get();

        return response()->json(['data' => $allForms]);
    }

    public function getFormDataById(Request $request)
    {
        $form = Form::where('id', $request->id)->with('famulus_offers', 'document')->first();

        return response()->json($form);
    }

    public function rejectForm(Request $request)
    {
        $form = Form::where('id', $request->formId)->first();

        if (! $form) {
            return response()->json(['error' => 'Form not found'], 404);
        }

        $form->update([
            'status' => Statuses::ELUTASITVA,
            'comment' => $request->reason,
        ]);

        $name = 'Albert Kázmér';
        $reason = 'Kevés alkohol';

        Mail::to('albert@kazmer.com')->send(new RejectEmail($name, $reason));

        return response()->json([
            'message' => 'Form successfully rejected',
        ]);
    }

    public function acceptForm(Request $request)
    {
        $form = Form::where('id', $request->formId)->first();

        if (! $form) {
            return response()->json(['error' => 'Form not found'], 404);
        }

        $form->update([
            'status' => Statuses::UF_ARAJANLATRA_VAR,
        ]);

        return response()->json([
            'message' => 'Form successfully accepted',
        ]);
    }

    public function modifyForm(Request $request)
    {
        $form = Form::where('id', $request->id)->first();

        if (! $form) {
            return response()->json(['error' => 'Form not found'], 404);
        }

        $formData = $request->only([
            'event_name',
            'event_description',
            'event_place',
            'event_address',
            'event_type',
            'event_classification',
            'start_date',
            'start_time',
            'end_date',
            'end_time',
            'participants',
            'press_public',
            'nature',
            'program_plan',
            'venue_setup',
            'accommodation_needed',
            'accommodation_count',
            'parking_needed',
            'parking_details',
            'waste_generated',
            'waste_disposal',
            'waste_handler',
            'internet_needed',
            'tech_support_needed',
            'tech_equipment',
            'fire_hazard',
            'fire_hazard_description',
            'activities',
            'chemical_usage',
            'chemical_description',
            'decorations',
            'organizer_name',
            'organizer_phone',
            'organizer_email',
            'organizer_address',
            'additional_organizer',
            'additional_organizer_name',
            'additional_organizer_neptun_code',
            'additional_organizer_phone',
            'additional_organizer_email',
            'additional_organizer_address',
            'client_name',
            'client_address',
            'client_tax_number',
            'client_phone',
            'client_email',
            'data_protection',
            'event_regulations',
            'recording_tools',
            'catering_type',
            'construction_needed',
            'construction_start_date',
            'construction_start_time',
            'construction_end_date',
            'construction_end_time',
            'mechanical_equipment',
            'mechanical_other_tool',
            'electrical_needed',
            'power_cabinet',
            'power_demand',
            'subcontractors',
            'event_notification_form',
            'venue_layout',
        ]);

        $updatedFields = [];
        foreach ($formData as $key => $value) {
            if ($value !== $form->$key) {
                $updatedFields[$key] = $value;
            }
        }

        if (empty($updatedFields)) {
            return response()->json(['message' => 'No fields have been updated'], 400);
        }

        $form->update($updatedFields);

        return response()->json([
            'message' => 'Form successfully modified',
            'updatedFields' => $updatedFields,
        ]);
    }

    public function selectFormByRole($role)
    {

        switch ($role) {
            case Role::RendezvenySzervezo:
                $query = Form::select('id', 'event_name', 'created_at', 'status', 'event_address', 'start_date', 'start_time', 'end_date', 'end_time')->orderBy('start_date', 'desc');
                break;
            case Role::UniFamulus:
                $query = Form::select('id', 'event_name', 'created_at', 'status', 'event_address', 'start_date', 'start_time', 'end_date', 'end_time')
                    ->orderBy('start_date', 'desc')
                    ->where('status', Statuses::UF_ARAJANLAT_ELFOGADASRA_VAR);
                break;
                // case Role::JogiOsztaly:
                //     $query = Form::select('id', 'event_name', 'created_at', 'status', 'event_address', 'start_date', 'start_time', 'end_date', 'end_time')
                //         ->orderBy('start_date', 'desc')
                //         ->where('status', Statuses::UF_ARAJANLAT_ELFOGADASRA_VAR);
                //     break;

            default:
                $query = Form::select('id', 'event_name', 'created_at', 'status', 'event_address', 'start_date', 'start_time', 'end_date', 'end_time')->orderBy('start_date', 'desc');
                break;
        }

        return $query;
    }

    public function famulus_offer(Request $request)
    {
        $form = Form::where('id', $request->formId)->firstOrFail();

        $price = 0;
        foreach ($request->offer_data as $offer) {
            FamulusOffers::create([
                'forms_id' => $form->id,
                'offer_name' => $offer['category'],
                'duration' => $offer['duration'],
                'price_per_unit' => $offer['price_per_unit'],
                'total_price' => $offer['total_price'],
                'night' => $offer['unit'] == 'night' ? true : false,
            ]);

            $price += $offer['total_price'];
        }

        $form->famulus_offer = $price;
        $form->status = Statuses::UF_ARAJANLAT_ELFOGADASRA_VAR;
        $form->updated_at = now();
        $form->save();

        return response()->json([], 200);
    }

    public function accept_famulus_by_uni(Request $request)
    {
        $form = Form::where('id', $request->formId)->firstOrFail();

        $form->status = Statuses::ARAJANLTAN_KESZITESRE_VAR;
        $form->updated_at = now();
        $form->save();
    }

    public function accept_event(Request $request)
    {
        $form = Form::where('id', $request->formId)->firstOrFail();

        if ($form->event_classification == 'Private') {
            $form->status = Statuses::SZERZODESES_ADATOKRA_VAR;
        } else {

            $form->status = Statuses::MEGVALOSULASRA_VAR;
        }
        $form->updated_at = now();
        $form->save();
    }

    public function mod_req(Request $request)
    {
        $form = Form::where('id', $request->formId)->firstOrFail();

        $form->comment = $request->reason;
        $form->status = Statuses::UF_ARAJANLATRA_VAR;
        $form->updated_at = now();

        $form->save();
    }

    public function get_docs()
    {
        $docs = DocumentTypes::all();

        return response()->json(['documents' => $docs]);
    }

    public function set_document(Request $request)
    {
        $form = Form::where('id', $request->formId)->firstOrFail();

        $doc = Document::create([
            'forms_id' => $form->id,
            'document_types_id' => $request->docId,
        ]);

        $doc = Document::where('id', $doc->id)->with('documentType')->first();

        return response()->json(['document' => $doc]);
    }

    public function generateDocx($event, $type)
    {

        $form = Form::where('id', $event)->firstOrFail();

        switch ($type) {
            case 1:
                $templatePath = storage_path('app/public/templates/Berleti_szerzodes_sablon.docx');
                break;
            case 2:
                $templatePath = storage_path('app/public/templates/Berleti_szerzodes_sablon_Csarnok.docx');
                break;
            case 3:
                $templatePath = storage_path('app/public/templates/Hasznalati_szerzodes_sablon.docx');
                break;
            case 4:
                $templatePath = storage_path('app/public/templates/Hasznalati_szerzodes_sablon.docx');
                break;


            default:
                return response()->json([],404);
                break;
        }


        $templateProcessor = new TemplateProcessor($templatePath);

        $idotartam = str_replace('-', '.', $form->start_date).' '.$form->start_time.' (tól/től) - '.str_replace('-', '.', $form->end_date).' '.$form->end_time.' (ig)';


        $templateProcessor->setValue('masreszrol', $form->client_name);
        $templateProcessor->setValue('szekhely', $form->client_address);
        $templateProcessor->setValue('torzskonyvi_nyil_szam', $form->torzskonyvi_nyil_szam);
        $templateProcessor->setValue('adoszam', $form->client_tax_number);
        $templateProcessor->setValue('kepviseli', $form->organizer_name);
        $templateProcessor->setValue('targyegy', $form->targyegy);
        $templateProcessor->setValue('targyketto', $form->targyketto);
        $templateProcessor->setValue('targyharom', $form->targyharom);
        $templateProcessor->setValue('meghatarozas', $form->meghatarozas);
        $templateProcessor->setValue('idotartam', $idotartam);
        $templateProcessor->setValue('hasznalatba_ado_nev', 'hozarendelt felhasznalo neve');
        $templateProcessor->setValue('hasznalatba_ado_email', 'ugyan ez csak emaillel');
        $templateProcessor->setValue('hasznalatba_vevo_nev', $form->organizer_name);
        $templateProcessor->setValue('hasznalatba_vevo_email', $form->organizer_email);
        $templateProcessor->setValue('kelt_hely', now()->format('Y-m-d'));
        $templateProcessor->setValue('szervezo', $form->organizer_name);
        $templateProcessor->setValue('pozicio', 'kacsakapitány');
        $templateProcessor->setValue('intezmeny', $form->client_name);

        $items = ['item_name' => 'Web Design', 'item_price' => '$500'];

        // $templateProcessor->cloneRowAndSetValues('item_name', $items);

        $fileName = $type .'_'.time().'.docx';
        $tempPath = storage_path('app/public/'.$fileName);

        $templateProcessor->saveAs($tempPath);

        // 6. Return the file as a download and delete the temp file afterward
        return response()->download($tempPath)->deleteFileAfterSend(true);
    }

    public function cancel_doc(Request $request)
    {
        $doc = Document::where('id', $request->docId)->firstOrFail();

        $doc->delete();

        return response()->json(['id' => $request->docId]);
    }

    public function to_law(Request $request)
    {
        $form = Form::where('id', $request->formId)->firstOrFail();

        $form->status = Statuses::SZERZODES_ATTNEZESRE_VAR;
        $form->updated_at = now();

        $form->save();
    }

    public function accept_law(Request $request)
    {
        $form = Form::where('id', $request->formId)->firstOrFail();

        $form->comment = $request->reason;
        $form->status = Statuses::PARTNERI_ALAIRASRA_VAR;
        $form->updated_at = now();

        $form->save();
    }

    public function accept_client(Request $request)
    {
        $form = Form::where('id', $request->formId)->firstOrFail();

        $form->status = Statuses::EGYETEMI_ALAIRASRA_VAR;
        $form->updated_at = now();

        $form->save();
    }

    public function accept_uni(Request $request)
    {
        $form = Form::where('id', $request->formId)->firstOrFail();

        $form->status = Statuses::SZERZODES_ALAIRVA;
        $form->updated_at = now();

        $form->save();
    }

    public function accept_evr(Request $request)
    {
        $form = Form::where('id', $request->formId)->firstOrFail();

        $form->status = Statuses::MEGVALOSULASRA_VAR;
        $form->updated_at = now();

        $form->save();
    }

    public function update_doc(Request $request)
    {
        $form = Form::where('id', $request->data['id'])->firstOrFail();

        $form->torzskonyvi_nyil_szam = $request->data['torzskonyvi_nyil_szam'];
        $form->targyegy = $request->data['targyegy'];
        $form->targyketto = $request->data['targyketto'];
        $form->meghatarozas= $request->data['meghatarozas'];

        $form->save();

        return response()->json($form);
    }

}
