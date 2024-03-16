<?php

namespace Database\Seeders;

use App\Models\SubjectArea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectAreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjectAreas = ['CSE', 'BBA', 'EEE', 'English'];
        foreach ($subjectAreas as $subjectArea) {
            SubjectArea::create(['name' => $subjectArea]);
        }
    }
}
