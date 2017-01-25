<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Snippet;
use App\User;

class SnippetsController extends Controller
{
    public function index()
    {
        $snippets = Snippet::latest()->get();
        $users = User::all();

        return view('snippets.index', compact('snippets', 'users'));
    }

    public function create(Snippet $snippet)
    {
        return view('snippets.create', compact('snippet'));
    }

    public function show(Snippet $snippet)
    {
        return view('snippets.show', compact('snippet'));
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
        ]);
        $user = auth()->user();
        $userId = $user ? $user->id : null;
        Snippet::create([
            'title' => request('title'),
            'body' => request('body'),
            'forked_id' => request('forked_id'),
            'user_id' => $userId,
        ]);

        return redirect()->route('snippets-home');
    }

    public function like(Snippet $snippet)
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->back();
        }

        $user->likes()->syncWithoutDetaching([$snippet->id]);

        return redirect()->back();
    }

    public function dislike(Snippet $snippet)
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->back();
        }

        $user->likes()->detach([$snippet->id]);

        return redirect()->back();
    }
}
