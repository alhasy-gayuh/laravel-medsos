<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TimelineController extends Controller
{
    public function index(User $user)
    {

        $statuses = Auth::user()->timeline(); // error gak jelas, karna intelephense nya PHP mungkin

        // return view('timeline', compact('statuses')); // untuk menampilkan status

        return view('timeline', [
            'statuses' => $statuses,
            'user' => $user,
        ]);
    }
}
