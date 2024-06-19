<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Conversation;
use App\Models\Message;

class MessageController extends Controller
{
    public function send(Request $request, Conversation $conversation)
    {
        $validatedData = $request->validate([
            'message_text' => 'required|string',
        ]);

        $message = new Message();
        $message->message_text = $validatedData['message_text'];
        $message->user_id = Auth::id();
        $message->conversation_id = $conversation->id;
        $message->save();

        return response()->json(['success' => true, 'message' => $message->load('user')]);
    }
}

