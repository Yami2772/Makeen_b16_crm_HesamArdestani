<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(Request $request, $id = null)
    {
        if ($id) {
            $User = User::with('Orders')
                ->where('id', $id)
                ->first();
        } else {
            $User = new User();
            if ($request->has_orders) {
                $User = $User->has('orders');
            }
            if ($request->price_filter) {
                $User = $User->whereHas('orders', 'TotalPrice');
            }
            if ($request->order_count) {
                $User = $User->withCount('orders');
            }
            $User = $User->get();
        }
        return response()
            ->json($User);
    }

    public function create(UserCreateRequest $request)
    {
        $User = User::create($request
            ->merge(["Password" => Hash::make($request->Password)])
            ->toArray());
        return response()
            ->json($User);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $User = User::where('id', $id)
            ->update($request->merge(["Password" => Hash::make($request->Password)])
                ->toArray());
        return response()
            ->json($User);
    }

    public function delete($id)
    {
        User::where('id', $id)
            ->delete();
        return response()
            ->json('user deleted successfuly');
    }

    public function Me(){
        $User = auth()->user();
        return response()->json($User);
    }
}
