<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowingController extends Controller
{


    // function untuk menampilkan follower dan following
    public function index(User $user, $following)
    {

        if ($following !== 'following' && $following !== 'followers') {
            return redirect(route('profile', $user->username));
        }

        return view('users.following', [
            'user' => $user,
            'follows' => $following == 'following' ? $follows = $user->follows : $follows = $user->followers,
        ]);
    }

    //code di atas lebih singkat dari di bawah,, tapi hasilnya sama saja

    // public function following(User $user)
    // {
    //     return view('users.following', [
    //         'following' => $user->follows,
    //         'user' => $user,
    //     ]);
    // }

    // public function follower(User $user)
    // {
    //     return view('users.following', [
    //         'following' => $user->followers,
    //         'user' => $user,
    //     ]);
    // }

    public function store(Request $request, User $user)
    {
        // garis merah di bawah follow ini sebenernya gak eror,, VSCode nya ini yang eror
        Auth::user()->hasFollow($user) ? Auth::user()->unfollow($user) : Auth::user()->follow($user);
        return back()->with('success', "you are follow the user");
    }
}
