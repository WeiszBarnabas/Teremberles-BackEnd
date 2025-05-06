<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'event_name' => $faker->sentence(10),
                'event_description' => $faker->paragraph,
                'event_place' => $faker->city,
                'event_address' => $faker->address,
                'event_type' => $faker->randomElement(['Conference', 'Workshop', 'Seminar']),
                'event_classification' => $faker->randomElement(['Public', 'Private']),
                'start_date' => $faker->date(),
                'start_time' => $faker->time(),
                'end_date' => $faker->date(),
                'end_time' => $faker->time(),
                'participants' => $faker->numberBetween(10, 500),
                'press_public' => $faker->boolean,
                'nature' => $faker->randomElement(['Educational', 'Entertainment', 'Business']),
                'program_plan' => $faker->sentence,
                'venue_setup' => $faker->randomElement(['Theater', 'Classroom', 'Banquet']),
                'accommodation_needed' => $faker->boolean,
                'accommodation_count' => $faker->numberBetween(0, 50),
                'parking_needed' => $faker->boolean,
                'parking_details' => $faker->sentence,
                'waste_generated' => $faker->boolean,
                'waste_disposal' => $faker->sentence,
                'waste_handler' => $faker->company,
                'internet_needed' => $faker->boolean,
                'tech_support_needed' => $faker->boolean,
                'tech_equipment' => $faker->sentence,
                'fire_hazard' => $faker->boolean,
                'fire_hazard_description' => $faker->optional()->sentence,
                'activities' => json_encode($faker->words(3)),
                'chemical_usage' => $faker->boolean,
                'chemical_description' => $faker->optional()->sentence,
                'decorations' => $faker->sentence,
                'organizer_name' => $faker->name,
                'organizer_phone' => $faker->phoneNumber,
                'organizer_email' => $faker->email,
                'organizer_address' => $faker->address,
                'additional_organizer' => $faker->boolean,
                'additional_organizer_name' => $faker->optional()->name,
                'additional_organizer_neptun_code' => $faker->optional()->regexify('[A-Z0-9]{6}'),
                'additional_organizer_phone' => $faker->optional()->phoneNumber,
                'additional_organizer_email' => $faker->optional()->email,
                'additional_organizer_address' => $faker->optional()->address,
                'client_name' => $faker->company,
                'client_address' => $faker->address,
                'client_tax_number' => $faker->regexify('[0-9]{9}'),
                'client_phone' => $faker->phoneNumber,
                'client_email' => $faker->email,
                'data_protection' => $faker->boolean,
                'event_regulations' => $faker->boolean,
                'recording_tools' => $faker->sentence,
                'catering_type' => json_encode($faker->randomElements(['Buffet', 'Drinks', 'Snacks'], 2)),
                'construction_needed' => $faker->boolean,
                'construction_start_date' => $faker->optional()->date(),
                'construction_start_time' => $faker->optional()->time(),
                'construction_end_date' => $faker->optional()->date(),
                'construction_end_time' => $faker->optional()->time(),
                'mechanical_equipment' => json_encode($faker->words(2)),
                'mechanical_other_tool' => $faker->optional()->sentence,
                'electrical_needed' => json_encode($faker->randomElements(['Lighting', 'Sound system', 'Projectors'], 2)),
                'power_cabinet' => $faker->sentence,
                'power_demand' => $faker->randomElement(['10 kW', '20 kW', '50 kW']),
                'subcontractors' => $faker->company,
                'event_notification_form' => $faker->word . '.pdf',
                'venue_layout' => $faker->word . '.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('forms')->insert($data);
    }
}
