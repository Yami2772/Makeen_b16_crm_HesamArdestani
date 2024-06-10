<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index($id = null)
    {
        if ($id) {
            $Task = Task::where('id', $id)->first();
        } else {
            $Task = Task::get();
        }
        return response()->json($Task);
    }

    public function create(Request $request)
    {
        $Task = Task::create($request->toArray());
        return response()->json($Task);
    }

    public function update(Request $request, $id)
    {
        $Task = Task::where('id', $id)->update($request->toArray());
        return response()->json($Task);
    }

    public function delete($id)
    {
        Task::where('id', $id)->delete();
        return response()->json('Task deleted successfuly');
    }
}
