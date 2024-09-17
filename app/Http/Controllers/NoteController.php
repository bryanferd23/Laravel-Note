<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::where("user_id", Auth::id())->orderBy("created_at", "DESC")->paginate(5);
        return view('notes.index', ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedRequest = $request->validate([
            'note' =>'required|string',
        ]);
        $note = new Note();
        $note->user_id = Auth::id();
        $note->note = $validatedRequest['note'];
        $note->save();
        return redirect()->route('notes.index')->with('message', 'Note created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // Fetch the note and ensure it belongs to the authenticated user
        $note = Note::where('id', $request->id)->where('user_id', Auth::id())->firstOrFail();
        return view('notes.edit', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Fetch the note that belongs to the authenticated user
        $note = Note::where('id', $request->id)->where('user_id', Auth::id())->firstOrFail();
        
        $validatedRequest = $request->validate([
            'note' =>'required|string',
        ]);
        $note->note = $validatedRequest['note'];
        $note->save();
        return redirect()->route('notes.index')->with('message', 'Note updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // Fetch the note that belongs to the authenticated user
        $note = Note::where('id', $request->id)->where('user_id', Auth::id())->firstOrFail();
        $note->delete();
        return redirect()->route('notes.index')->with('message', 'Note deleted successfully');
    }
}
