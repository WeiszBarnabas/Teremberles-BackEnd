<?php

namespace App\Models;

use App\Enums\Statuses;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
        'event_name', 'event_description', 'event_place', 'event_address',
        'event_type', 'event_classification', 'start_date', 'start_time',
        'end_date', 'end_time', 'participants', 'press_public', 'nature',
        'program_plan', 'venue_setup', 'accommodation_needed',
        'accommodation_count', 'parking_needed', 'parking_details',
        'waste_generated', 'waste_disposal', 'waste_handler',
        'internet_needed', 'tech_support_needed', 'tech_equipment',
        'fire_hazard', 'fire_hazard_description', 'activities',
        'chemical_usage', 'chemical_description', 'decorations',
        'organizer_name', 'organizer_phone', 'organizer_email', 'organizer_address',
        'additional_organizer', 'additional_organizer_name', 'additional_organizer_neptun_code',
        'additional_organizer_phone', 'additional_organizer_email', 'additional_organizer_address',
        'client_name', 'client_address', 'client_tax_number', 'client_phone', 'client_email',
        'event_notification_form', 'venue_layout', 'data_protection', 'event_regulations',
        'recording_tools', 'catering_type', 'construction_needed', 'construction_start_date',
        'construction_start_time', 'construction_end_date', 'construction_end_time',
        'mechanical_equipment', 'mechanical_other_tool', 'electrical_needed', 'power_cabinet', 'power_demand',
        'subcontractors', 'status', 'comment'
    ];

    protected $casts = [
        'status' => Statuses::class,
    ];

}
