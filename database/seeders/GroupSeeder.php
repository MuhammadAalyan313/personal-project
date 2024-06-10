<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\group::create([
            'role' => 'User',
            ]);
                \App\Models\group::create([
                    'role' => 'Admin',
                ]);
        \App\Models\group::create([
            'role' => 'Staff',
        ]);
    }
}
