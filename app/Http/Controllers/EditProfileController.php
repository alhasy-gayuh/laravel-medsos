<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditProfileController extends Controller
{
    public function edit()
    {
        return view('users.edit');
    }

    public function update(Request $request)
    {
        // jangan lupa di validasi dulu
        $attr = $request->validate([
            'name' => ['string', 'min:3', 'max:191', 'required'],
            'email' => ['email', 'string', 'min:3', 'max:191', 'required'],
            'username' => ['required', 'alpha_num', 'unique:users,username,' . auth()->id()],
        ]);
        auth()->user()->update($attr);
        return back()->with('message', 'Your Profile has been Updated');
    }
}
