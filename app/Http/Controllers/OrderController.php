<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index($id = null)
    {
        if ($id) {
            $Order = Order::with('User')
                ->where('id', $id)
                ->first();
        } else {
            $Order = Order::with('User')
                ->get();
        }
        return response()->json($Order);
    }

    public function create(Request $request)
    {
        $Order = Order::create($request
            ->toArray());
        $Order->Products()->attach($request->product_id);
        return response()->json($Order);
    }

    public function update(Request $request, $id)
    {
        $Order = Order::where('id', $id)
            ->update($request
                ->toArray());
        return response()->json($Order);
    }

    public function delete($id)
    {
        Order::where('id', $id)
            ->delete();
        return response()->json('Order deleted successfuly');
    }

    public function shithead(Request $request)
    {
        $MobileNumber = $request->MobileNumber;

        $Orders = new Order();
        $Orders = Order::whereHas(
            'User',
            User::where('MobileNumber', $request->MobileNumber)
        );
        $Orders->$Orders->paginate(10);
    }
}
