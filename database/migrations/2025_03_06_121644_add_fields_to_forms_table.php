<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enum\Statues;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('forms', function (Blueprint $table) {
            $table->renameColumn('name', 'event_name');
            $table->renameColumn('description', 'event_description');
            $table->renameColumn('place', 'event_place');
            $table->renameColumn('address', 'event_address');

            $table->string('event_type')->nullable();
            $table->string('event_classification')->nullable();

            // Timing
            $table->date('start_date')->nullable();
            $table->time('start_time')->nullable();
            $table->date('end_date')->nullable();
            $table->time('end_time')->nullable();

            // Specifics
            $table->string('participants')->nullable();
            $table->string('press_public')->nullable();
            $table->string('nature')->nullable();
            $table->text('program_plan')->nullable();
            $table->text('venue_setup')->nullable();

            // Logistics
            $table->boolean('accommodation_needed')->default(false);
            $table->integer('accommodation_count')->nullable();
            $table->boolean('parking_needed')->default(false);
            $table->text('parking_details')->nullable();
            $table->string('waste_generated')->nullable();
            $table->string('waste_disposal')->nullable();
            $table->string('waste_handler')->nullable();
            $table->boolean('internet_needed')->default(false);
            $table->boolean('tech_support_needed')->default(false);
            $table->text('tech_equipment')->nullable();

            // Additional Requirements
            $table->boolean('limited_mobility')->default(false);
            $table->boolean('photo_video_recording')->default(false);
            $table->string('recording_tools')->nullable();
            $table->boolean('catering_needed')->default(false);
            $table->json('catering_type')->nullable();
            $table->boolean('construction_needed')->default(false);
            $table->date('construction_start_date')->nullable();
            $table->time('construction_start_time')->nullable();
            $table->date('construction_end_date')->nullable();
            $table->time('construction_end_time')->nullable();
            $table->string('subcontractors')->nullable();
            $table->boolean('high_altitude_work')->default(false);
            $table->boolean('scaffolding_needed')->default(false);
            $table->boolean('manual_material_handling')->default(false);
            $table->boolean('mechanical_material_handling')->default(false);
            $table->json('mechanical_equipment')->nullable();
            $table->string('mechanical_other_tool')->nullable();
            $table->boolean('cleaning_before')->default(false);
            $table->boolean('cleaning_during')->default(false);
            $table->json('electrical_needed')->nullable();
            $table->string('power_cabinet')->nullable();
            $table->string('power_demand')->nullable();

            // Safety Compliance
            $table->boolean('fire_hazard')->default(false);
            $table->text('fire_hazard_description')->nullable();
            $table->json('activities')->nullable();
            $table->boolean('chemical_usage')->default(false);
            $table->text('chemical_description')->nullable();
            $table->text('decorations')->nullable();

            // Organizer Details
            $table->string('organizer_name')->nullable();
            $table->string('organizer_phone')->nullable();
            $table->string('organizer_email')->nullable();
            $table->string('organizer_address')->nullable();
            $table->string('additional_organizer')->nullable();
            $table->string('additional_organizer_name')->nullable();
            $table->string('additional_organizer_neptun_code')->nullable();
            $table->string('additional_organizer_phone')->nullable();
            $table->string('additional_organizer_email')->nullable();
            $table->string('additional_organizer_address')->nullable();

            // Client Details
            $table->string('client_name')->nullable();
            $table->string('client_address')->nullable();
            $table->string('client_tax_number')->nullable();
            $table->string('client_phone')->nullable();
            $table->string('client_email')->nullable();

            // File Uploads
            $table->string('event_notification_form')->nullable();
            $table->string('venue_layout')->nullable();

            // Agreements
            $table->boolean('data_protection')->default(false);
            $table->boolean('event_regulations')->default(false);

            //Status
            $table->string('status')->default(Statues::BEERKEZETT);

            $table->text('comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('forms', function (Blueprint $table) {
            $table->renameColumn('event_name', 'name');
            $table->renameColumn('event_description', 'description');
            $table->renameColumn('event_place', 'place');
            $table->renameColumn('event_address', 'address');
            $table->dropColumn([
                'event_type', 'event_classification', 'start_date', 'start_time',
                'end_date', 'end_time', 'participants', 'press_public', 'nature',
                'program_plan', 'venue_setup', 'accommodation_needed',
                'accommodation_count', 'parking_needed', 'parking_details',
                'waste_generated', 'waste_disposal', 'waste_handler',
                'internet_needed', 'tech_support_needed', 'tech_equipment',
                'limited_mobility', 'photo_video_recording', 'recording_tools',
                'catering_needed', 'catering_type', 'construction_needed',
                'construction_start_date', 'construction_start_time',
                'construction_end_date', 'construction_end_time', 'subcontractors',
                'high_altitude_work', 'scaffolding_needed', 'manual_material_handling',
                'mechanical_material_handling', 'mechanical_equipment',
                'mechanical_other_tool', 'cleaning_before', 'cleaning_during',
                'electrical_needed', 'power_cabinet', 'power_demand', 'fire_hazard',
                'fire_hazard_description', 'activities', 'chemical_usage',
                'chemical_description', 'decorations', 'organizer_name',
                'organizer_phone', 'organizer_email', 'organizer_address',
                'additional_organizer', 'additional_organizer_name',
                'additional_organizer_neptun_code', 'additional_organizer_phone',
                'additional_organizer_email', 'additional_organizer_address',
                'client_name', 'client_address', 'client_tax_number', 'client_phone',
                'client_email', 'event_notification_form', 'venue_layout',
                'data_protection', 'event_regulations', 'status','comment'
            ]);
        });
    }
};
