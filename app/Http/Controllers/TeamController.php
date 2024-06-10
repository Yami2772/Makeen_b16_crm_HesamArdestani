<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index($id = null)
    {
        if ($id) {
            $Team = Team::where('id', $id)->first();
        } else {
            $Team = Team::get();
        }
        return response()->json($Team);
    }

    public function create(Request $request)
    {
        $Team = Team::create($request->toArray());
        return response()->json($Team);
    }

    public function update(Request $request, $id)
    {
        $Team = Team::where('id', $id)->update($request->toArray());
        return response()->json($Team);
    }

    public function delete($id)
    {
        Team::where('id', $id)->delete();
        return response()->json('Team deleted successfuly');
    }
}
