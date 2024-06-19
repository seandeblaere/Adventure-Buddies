<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adventure;
use App\Models\Conversation;
use App\QueryBuilders\AdventureQueryBuilder;
use Illuminate\Support\Facades\Auth;

class AdventureController extends Controller
{
    public function index()
    {
        $search = request('search');
        $builder = new AdventureQueryBuilder();

        if ($search) {
            $builder->whereTitleOrLocationLike($search);
        }

        $adventures = $builder->get(20);

        $adventures->appends(['search' => $search]);

        return view('index', compact('adventures'));
    }

    public function detail(Adventure $adventure) {
        return view('adventure.show', [
            'adventure' => $adventure
        ]);
    }

    public function create() {
        return view('adventure.create');
    }

    public function store(Request $request) {

        $request->validate([
            'title' => 'required | max:255',
            'description' => 'required',
            'location' => 'required',
            'date' => 'required|date',
            'duration' => 'required|numeric|min:30|max:240',
            'capacity' => 'required|numeric|min:5|max:20',
            'user_id' => 'required|exists:users,id|numeric',
        ]);

        $adventure = new Adventure();
        $adventure->title = $request->title;
        $adventure->description = $request->description;
        $adventure->location = $request->location;
        $adventure->date = $request->date;
        $adventure->duration = $request->duration;
        $adventure->capacity = $request->capacity;
        $adventure->image_url = $request->input('image_url') ?: 'https://images.pexels.com/photos/758744/pexels-photo-758744.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1';
        $adventure->user_id = Auth::id();

        $adventure->save();

        $conversation = new Conversation();
        $conversation->name = $adventure->title;
        $conversation->adventure_id = $adventure->id;
        $conversation->save();

        $conversation->members()->attach(Auth::id(), ['joined_at' => now()]);

        return redirect()->route('adventure', ['adventure' => $adventure]);
    }

    public function delete(Adventure $adventure)
{
    if ($adventure->user_id === auth()->id()) {
        $adventure->delete();
    }
    return redirect()->route('home');
}

public function join(Adventure $adventure) {
    $user_id = Auth::id();

    if (!$adventure->participants()->where('user_id', $user_id)->exists()) {
        $adventure->participants()->attach($user_id);
    }

    $conversation = $adventure->conversation;
    if ($conversation && !$conversation->members()->where('user_id', $user_id)->exists()) {
        $conversation->members()->attach($user_id);
    }

    $adventure->load('participants');

    return redirect()->route('adventure', ['adventure' => $adventure->title]);
}

    public function interest(Adventure $adventure) {

        $adventure = Adventure::find($adventure->id);
    
        $user_id = Auth::id();

        if (!$adventure->interestedUsers()->where('user_id', $user_id)->exists()) {
            $adventure->interestedUsers()->attach($user_id);
        }
  
        return redirect()->route('adventure', ['adventure' => $adventure]);
    }
}

