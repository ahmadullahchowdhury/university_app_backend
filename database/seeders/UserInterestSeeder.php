<?php

namespace Database\Seeders;

use App\Models\UserInterest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserInterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['full_name' => 'John Doe', 'email' => 'john@example.com', 'date_of_birth' => '1990-01-01', 'interest_area' => 'CSE' , 'marketing_updates' => true, 'correspondence_in_welsh' => false, 'gps_location' => '48.8566, 2.3522'],
            ['full_name' => 'Jane Smith', 'email' => 'jane@example.com', 'date_of_birth' => '1995-05-15', 'interest_area' => 'BBA', 'marketing_updates' => true, 'correspondence_in_welsh' => false, 'gps_location' => '4.8566, 2.4522' ],
            
        ];

        foreach ($users as $userData) {
            $user = UserInterest::create([
                'full_name' => $userData['full_name'],
                'email' => $userData['email'],
                'date_of_birth' => $userData['date_of_birth'],
                'interest_area' => $userData['interest_area'],
                'marketing_updates' => $userData['marketing_updates'],
                'correspondence_in_welsh' => $userData['correspondence_in_welsh'],
                'gps_location' => $userData['gps_location'],

            ]);
        }
    }
}
