<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{

    public function index($id = null)
    {
        if ($id) {
            $Media = Media::where('id', $id)
                ->first();
        } else {
            $Media = Media::get();
        }
        return response()
            ->json($Media);
    }

    public function create(Request $request)
    {
        $Path = $request->file('Path')->store('public');

        $Media = Media::create($request->merge(['Path' => $Path])
            ->toArray());
        return response()
            ->json($Media);
    }

    public function update(Request $request, $id)
    {
        $Media = Media::where('id', $id)
            ->update($request->toArray());
        return response()
            ->json($Media);
    }

    public function delete($id)
    {
        Media::where('id', $id)
            ->delete();
        return response()
            ->json('media deleted successfuly');
    }

    public function download(Request $request)
    {
        $Path = $request->Path;
        return Storage::download($Path);
    }
}
