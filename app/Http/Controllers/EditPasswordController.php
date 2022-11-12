<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class EditPasswordController extends Controller
{
    public function edit()
    {
        return view('password.edit');
    }

    public function update(Request $request)
    {
        // validasi lagi
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        // cek apakah si user punya memasukkan password lama dengan benar.
        // nanti malah jangan-jangan si orang ini mau ngupdate password tapi gak ngerti password yang lama

        if (Hash::check($request->current_password, auth()->user()->password)) {
            auth()->user()->update([
                'password' => bcrypt($request->password),
            ]);
            return back()->with('message', 'your password has been updated');
        }
        throw ValidationException::withMessages([
            'current_password' => 'Your Current Password does Not match with our record',
        ]);
    }
}
