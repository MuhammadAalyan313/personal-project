<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\lead;

class LeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            Lead::create([
                'first_name' => fake()->firstName(),
                'last_name' => fake()->lastName(),
                'title' => 'fake title',
                'company' => fake()->company(),
                'phone' => fake()->phoneNumber(),
                'message' => fake()->sentence(),
                'address' => fake()->address(),
                'lead_source' => 'Advertising',
                'lead_status' => 'Qualification',
                'email' => fake()->safeEmail(),
                'user_id' => rand(6, 7),  
                'assigned_to' => rand(6, 7),  
                'status' => 'pending',
            ]);
        }

    }
}