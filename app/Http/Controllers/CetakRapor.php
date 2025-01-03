<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CetakRapor extends Controller
{
    public function cetak(Request $request, string $mode)
    {
        $data = json_decode(base64_decode($request->get('data')), true);
        // dd($data);
        if (!is_array($data)) {
            abort(500);
        }

        return view('cetak.' . $mode, ['data' => $data]);
    }
}
