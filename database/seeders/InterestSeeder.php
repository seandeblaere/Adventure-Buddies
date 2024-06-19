<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Adventure;
use App\Models\User;

class InterestSeeder extends Seeder
{
    /**
     * Seed the application's database with adventure participants.
     */
    public function run()
    {
        $adventures = Adventure::all();
        $users = User::all();

        foreach ($adventures as $adventure) {

            $interestCount = rand(0, 5);

            $interestedUsers = $users->shuffle()->take($interestCount);

            $adventure->interestedUsers()->attach($interestedUsers->pluck('id'));
        }
    }
}