<?php

namespace Database\Seeders;

use App\Models\Adventure;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Adventure::factory()->count(100)->create();
        $this->call(AdventureParticipantSeeder::class);
        $this->call(ConversationSeeder::class);
        $this->call(ConversationMemberSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(InterestSeeder::class);
    }
}
