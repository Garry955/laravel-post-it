<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Post;
use App\Traits\Friendable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Friendable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'city',
        'gender',
        'description',
        'user_img_path',
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
    
    public function post() {
        return $this->hasMany(Post::class, 'user_id');
    }
}




// public function friend() {
//     //     return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id')
//     // // if you want to rely on accepted field, then add this:
//     //     ->wherePivot('accepted', '=', 1);
//     return $this->mergedRelationWithModel(User::class, 'friends_view');
        
//         // return $this->mergedRelationWithModel(User::class, 'friends_view');
//     }

//     public function friendsTo()
//     {
//         return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id')
//             ->withPivot('accepted')
//             ->withTimestamps();
//     }
 
//     public function friendsFrom()
//     {
//         return $this->belongsToMany(User::class, 'friends', 'friend_id', 'user_id')
//             ->withPivot('accepted')
//             ->withTimestamps();
//     }

//     public function pendingFriendsTo()
//     {
//         return $this->friendsTo()->wherePivot('accepted', false);
//     }
    
//     public function pendingFriendsFrom()
//     {
//         return $this->friendsFrom()->wherePivot('accepted', false);
//     }
    
//     public function acceptedFriendsTo()
//     {
//         return $this->friendsTo()->wherePivot('accepted', true);
//     }
    
//     public function acceptedFriendsFrom()
//     {
//         return $this->friendsFrom()->wherePivot('accepted', true);
//     }
