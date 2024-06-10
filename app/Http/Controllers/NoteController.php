<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Mockery\Matcher\Not;

class NoteController extends Controller
{
    public function index($id = null)
    {
        if ($id) {
            $Note = Note::where('id', $id)->first();
        } else {
            $Product = Note::get();
        }
        return response()->json($Note);
    }

    public function create(Request $request)
    {
        $Note = Note::create($request->toArray());
        return response()->json($Note);
    }

    public function update(Request $request, $id)
    {
        $Note = Note::where('id', $id)->update($request->toArray());
        return response()->json($Note);
    }

    public function delete($id)
    {
        Note::where('id', $id)->delete();
        return response()->json('Note deleted successfuly');
    }
}
