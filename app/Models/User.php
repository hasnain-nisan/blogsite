<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Profile;
use App\Models\Post;
use App\Models\Comment;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    protected static function boot()
    {
      parent::boot();
      static::created(function ($user) {
        $user->profile()->create([
          'title' => $user->username,
        ]);
      });
    }

    public function following()
    {
      return $this->belongsToMany(Profile::class);
    }

    public function profile()
    {
      return $this->hasOne(Profile::class);
    }

    public function posts()
    {
      return $this->hasMany(Post::class)->orderBy('created_at', 'desc');
    }

    public function comments()
    {
      return $this->hasMany(Comment::class);
    }

}
