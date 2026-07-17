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
        $data = $request->only('title','content','folder_id','is_starred');
        $data['user_id'] = 2;

        Note::create($data);
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
