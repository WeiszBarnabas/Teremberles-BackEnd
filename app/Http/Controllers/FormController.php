<?php

namespace App\Http\Controllers;

use App\Enum\Statues;
use App\Models\Form;
use Illuminate\Http\Request;


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
                'form' => $form->id
            ], 201);

        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Database error occurred',
                'error' => $e->getMessage()
            ], 500);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An unexpected error occurred',
                'error' => $e->getMessage()
            ], 500);
        }

    }

    public function getAll()
    {
        $allForms = Form::orderBy('created_at', 'desc')->get();
        return response()->json(["data" => $allForms]);
    }

    public function getFormData()
    {
        //TODO jogosultság alapján adja vissza
        $allForms = Form::select('id', 'event_name', 'created_at', 'status')->get();
        return response()->json(["data" => $allForms]);

    }

    public function getFormDataById(Request $request)
    {
        $form = Form::findOrFail($request->id);
        return response()->json($form);
    }

    public function rejectForm(Request $request)
    {
        $form = Form::where("id", $request->formId)->first();

        if (!$form) {
            return response()->json(['error' => 'Form not found'], 404);
        }

        $form->update([
            'status' => Statues::ELUTASITVA,
            'comment' => $request->reason
        ]);

        return response()->json([
            'message' => 'Form successfully rejected',
        ]);
    }

}
