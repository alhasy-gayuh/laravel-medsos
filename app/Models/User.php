<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\Following;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Following;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function gravatar($size = 100)
    {
        $default = "mm";
        return "https://www.gravatar.com/avatar/" . md5(strtolower(trim($this->email))) . "?d=" . urlencode($default) . "&s=" . $size;
    }

    /**
     * Get all of the statuses for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * 
     * Satu user dapat memiliki banyak status
     */
    public function statuses(): HasMany
    {
        return $this->hasMany(Status::class);
    }

    // mari membuat methode untuk memPost status
    public function makeStatus($string)
    {
        $this->statuses()->create([
            'body' => $string,
            'identifier' => Str::slug(Str::random(31) . $this->id),
        ]);
    }

    // mari kita buat methode untuk menampilkan status dari setiap user
    public function timeline()
    {
        // ambil data darii user yang di follow lalu tampilkan
        $following = $this->follows->pluck('id');

        return Status::whereIn('user_id', $following)
            ->orWhere('user_id', $this->id)
            ->latest()
            ->get();
    }
}
