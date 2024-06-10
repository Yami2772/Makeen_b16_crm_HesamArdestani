<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index($id = null)
    {
        if ($id) {
            $Message = Message::where('id', $id)->first();
        } else {
            $Message = Message::get();
        }
        return response()->json($Message);
    }

    public function create(Request $request)
    {
        $Message = Message::create($request->toArray());
        return response()->json($Message);
    }

    public function update(Request $request, $id)
    {
        $Message = Message::where('id', $id)->update($request->toArray());
        return response()->json($Message);
    }

    public function delete($id)
    {
        Message::where('id', $id)->delete();
        return response()->json('Message deleted successfuly');
    }
}
