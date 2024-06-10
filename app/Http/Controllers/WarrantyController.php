<?php

namespace App\Http\Controllers;

use App\Models\Warranty;
use Illuminate\Http\Request;

class WarrantyController extends Controller
{
    public function index($id = null)
    {
        if ($id) {
            $Warranty = Warranty::where('id', $id)->first();
        } else {
            $Warranty = Warranty::get();
        }
        return response()->json($Warranty);
    }

    public function create(Request $request)
    {
        $Warranty = Warranty::create($request->toArray());
        return response()->json($Warranty);
    }

    public function update(Request $request, $id)
    {
        $Warranty = Warranty::where('id', $id)->update($request->toArray());
        return response()->json($Warranty);
    }

    public function delete($id)
    {
        Warranty::where('id', $id)->delete();
        return response()->json('Warranty deleted successfuly');
    }
}
