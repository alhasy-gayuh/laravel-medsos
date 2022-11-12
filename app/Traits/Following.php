<?php

namespace App\Traits;

use App\Models\User;

trait Following
{
    public function follows()
    {
        return $this->BelongsToMany(User::class, 'follows', 'user_id', 'following_user_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->BelongsToMany(User::class, 'follows', 'following_user_id', 'user_id')->withTimestamps();
    }

    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function unFollow(User $user)
    {
        return $this->follows()->detach($user);
        // detach itu artinya untuk melepaskan hubungan dari kedua ralasi
        // sederhananya dengan detach hanya akan menghapus yang bersangkutan saja
        // tapi kalau menggunakan delete() itu akan menghapus semua
    }

    public function hasFollow(User $user)
    {
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }
}
