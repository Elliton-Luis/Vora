<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Note;

class NoteController extends Controller
{
    public function index()
    {
        return Note::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'content' => 'nullable|string',
            'folder_id' => 'nullable|exists:folders,id',
            'is_starred' => 'boolean'
        ]);

        $validated['user_id'] = auth()->id() ?? 2;

        $note = Note::create($validated);

        return response()->json($note,201);
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
