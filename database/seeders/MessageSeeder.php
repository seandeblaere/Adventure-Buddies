<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Message;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maxMessagesPerConversation = 8;

        $users = User::all();

        foreach ($users as $user) {

            $conversations = $user->conversations()->get();

            foreach ($conversations as $conversation) {

                if ($conversation->messages()->count() >= $maxMessagesPerConversation) {
                    continue;
                }

                $remainingMessages = $maxMessagesPerConversation - $conversation->messages()->count();
                $messageCount = rand(1, $remainingMessages);

                Message::factory()->count($messageCount)->create([
                    'user_id' => $user->id,
                    'conversation_id' => $conversation->id,
                ]);
            }
        }
    }
}
