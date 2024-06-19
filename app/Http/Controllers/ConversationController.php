<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $conversations = Conversation::whereHas('members', function($query) use ($userId) {
            $query->where('user_id', $userId);
        })->with('messages.user')->get();

        // userId meegeven om in script te gebruiken
        return view('chat.index', compact('conversations', 'userId'));
    }

    public function show(Conversation $conversation)
    {
        $messages = $conversation->messages()->with('user')->get();
        return response()->json(['messages' => $messages]);
    }
}
