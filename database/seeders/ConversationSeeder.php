<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Adventure;
use App\Models\Conversation;

class ConversationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adventures = Adventure::all();

        foreach ($adventures as $adventure) {
            $conversation = Conversation::create([
                'name' => $adventure->title,
                'adventure_id' => $adventure->id,
            ]);
        }
    }
}
