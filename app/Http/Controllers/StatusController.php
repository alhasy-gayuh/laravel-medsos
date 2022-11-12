<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;

class StatusController extends Controller
{
    // buat methode untuk post status
    public function store(StatusRequest $request)
    {
        // pertama buat validasi dulu
        // tapi validasinya sudah di pindah ke App\Http\Request

        // input post nya
        $request->make();

        // lempar ke halaman sebelumnya
        return redirect()->back();
    }
}
