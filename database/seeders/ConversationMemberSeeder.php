<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Adventure;
use App\Models\Conversation;

class ConversationMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adventures = Adventure::all();

        foreach ($adventures as $adventure) {
            $creatorId = $adventure->user_id;
        
            $participantIds = $adventure->participants()->pluck('id')->toArray();
        
            $userIds = array_merge([$creatorId], $participantIds);
        
            $conversation = Conversation::where('adventure_id', $adventure->id)->first();
        
            foreach ($userIds as $userId) {
                $conversation->members()->attach($userId);
            }
        }
    }
}
