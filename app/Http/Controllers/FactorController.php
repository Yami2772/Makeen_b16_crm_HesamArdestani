<?php

namespace App\Http\Controllers;

use App\Models\Factor;
use Illuminate\Http\Request;

class FactorController extends Controller
{
    public function index($id = null)
    {
        if ($id) {
            $Factor = Factor::where('id', $id)->first();
        } else {
            $Factor = Factor::get();
        }
        return response()->json($Factor);
    }

    public function create(Request $request)
    {
        $Factor = Factor::create($request->toArray());
        return response()->json($Factor);
    }

    public function update(Request $request, $id)
    {
        $Factor = Factor::where('id', $id)->update($request->toArray());
        return response()->json($Factor);
    }

    public function delete($id)
    {
        Factor::where('id', $id)->delete();
        return response()->json('Factor deleted successfuly');
    }
}
