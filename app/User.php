<?php

namespace App;

use App\Tweet;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'username', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

      public function getAvatarAttribute()
      {
          return "https://i.pravatar.cc/200?u=" . $this->email;
      }  

      public function setPasswordAttribute($value)
      {
        $this->attributes['password'] = bcrypt($value);
      }

      public function timeline()
      {
         //include all of the users tweets, 
         //as well as the tweets of everyone that they follow..in descending order by date
         $friends = $this->follows()->pluck('id');
         
         return Tweet::whereIn('user_id', $friends)
            ->orWhere('user_id', $this->id)
            ->latest()->paginate(10);

      }  

      public function tweets()
      {
          return $this->hasMany(Tweet::class);
      }

      

      public function getRouteKeyName()
      {
          return 'name';
      }

      //generate path to the users profile
      public function path($append = '')
      {
          $path = route('profile', $this->username);
  
          return $append ? "{$path}/{$append}" : $path;
      }
}
