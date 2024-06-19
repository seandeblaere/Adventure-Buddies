<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Adventure;
use App\Models\User;

class AdventureParticipantSeeder extends Seeder
{
    /**
     * Seed the application's database with adventure participants.
     */
    public function run()
    {
        $adventures = Adventure::all();

        foreach ($adventures as $adventure) {

            $maxCapacity = $adventure->capacity;

            $creatorId = $adventure->user_id;

            $users = User::where('id', '!=', $creatorId)->get();

            $participantsCount = rand(0, $maxCapacity);

            $participants = $users->shuffle()->take($participantsCount);

            $adventure->participants()->attach($participants->pluck('id'));
        }
    }
}