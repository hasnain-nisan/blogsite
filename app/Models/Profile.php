<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'title',
        'description',
        'image',
        'user_id'
    ];

    public function proImage()
    {
      if(is_null($this->image)) {
         return asset('images/profiles/default.png');
         // return 'http://localhost/techblog/public/images/default.png';
      } else {
        return asset('images/profiles/' .$this->image);
        // return 'http://localhost/techblog/public/images/profiles/' .$this->image;
      }
    }

    public function follower()
    {
      return $this->belongsToMany(User::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
