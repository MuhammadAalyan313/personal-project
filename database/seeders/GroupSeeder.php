<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\group;

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
                group::create([
                    'role' => 'Admin',
                ]);
                group::create([
            'role' => 'Staff',
        ]);
    }
}
