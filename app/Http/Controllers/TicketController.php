<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index($id = null)
    {
        if ($id) {
            $Ticket = Ticket::where('id', $id)->first();
        } else {
            $Ticket = Ticket::get();
        }
        return response()->json($Ticket);
    }

    public function create(Request $request)
    {
        $Ticket = Ticket::create($request->toArray());
        return response()->json($Ticket);
    }

    public function update(Request $request, $id)
    {
        $Ticket = Ticket::where('id', $id)->update($request->toArray());
        return response()->json($Ticket);
    }

    public function delete($id)
    {
        Ticket::where('id', $id)->delete();
        return response()->json('Ticket deleted successfuly');
    }
}
