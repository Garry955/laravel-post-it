<?php
namespace App\Traits;

trait Friendable {
    public function friends() {
        // return $this->belongsToMany(self::class, 'friends', 'user_id', 'friend_id')->withTimestamps()->withPivot();
        
        return $this->belongsToMany(self::class, 'friends', 'friend_id', 'user_id')
            ->wherePivot('status','accepted')->withTimestamps()->withPivot(['user_id','friend_id']);
    }
   
    public function friendRequests() {
        return $this->belongsToMany(self::class, 'friends', 'friend_id', 'user_id')->wherePivot('status','pending');
    }
    
    public function sentRequests() {
        return $this->belongsToMany(self::class, 'friends', 'user_id', 'friend_id')->wherePivot('status','pending');
        // return $this->belongsToMany(self::class, 'friends', 'user_id', 'friend_id')->wherePivot('status','pending');
    }

    public function myFriends() {
        
        $from = $this->belongsToMany(self::class, 'friends', 'friend_id', 'user_id')
            ->wherePivot('status','accepted')->withTimestamps()
            ->pluck('user_id')->toArray();
        $to = $this->belongsToMany(self::class, 'friends', 'user_id', 'friend_id')
            ->wherePivot('status','accepted')->withTimestamps()
            ->pluck('friend_id')->toArray();

        return array_merge($from,$to);

        // dd($all,auth()->user()->id);
    }
}
