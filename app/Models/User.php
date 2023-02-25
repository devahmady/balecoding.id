<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

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

    public function blog()
    {
        // satu user boleh punya banyak post
        return $this->hasMany(Blog::class);
    }
    public function like()
    {
        // satu user boleh punya banyak post
        return $this->hasMany(Like::class);
    }
    public function diskus()
    {
        return $this->hasMany(Diskus::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    // public function isOnline()
    // {
    //     return Cache::has('user-is-online' . $this->id);
    //     $user = User::find(1);

    //     if ($user->isOnline()) {
    //         echo 'User is online';
    //     } else {
    //         echo 'User is offline';
    //     }
    // }
}
