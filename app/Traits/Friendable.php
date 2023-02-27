<?php
namespace App\Traits;

use App\Models\User;
use App\Models\Friend;

trait Friendable {
    public function friends() {
        return $this->belongsToMany(self::class, 'friends', 'user_id', 'friend_id')->withTimestamps();
    }
   
    public function friendRequests() {
        return $this->belongsToMany(self::class, 'friends', 'user_id', 'friend_id')->wherePivot('status','pending');
    }

    public function sentRequests() {
        return $this->belongsToMany(self::class, 'friends', 'friend_id', 'user_id')->wherePivot('status','pending');
    }

    public function myFriends() {
        return $this->belongsToMany(self::class, 'friends', 'user_id', 'friend_id')->wherePivot('status','accepted');
    }
}

?>