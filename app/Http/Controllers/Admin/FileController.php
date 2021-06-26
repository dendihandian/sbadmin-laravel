<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function image(Request $request, $filename)
    {
        $base64image = Storage::get("files/{$filename}");
        return response($base64image)->header('Content-Type', 'image/png');
    }

    public function store(Request $request)
    {
        $file = $request->file($request->name);
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_' . Str::random(3) . '.' . $file->getClientOriginalExtension();
        Storage::putFileAs('files', $file, $filename);

        return response([
            $request->name => $filename
        ], 200);
    }

    public function destroy(Request $request)
    {
        dump($request->query());
        dd($request->all());
    }
}
