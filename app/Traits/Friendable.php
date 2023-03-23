<?php

namespace App\Traits;

use Illuminate\Http\Resources\MergeValue;

trait Friendable
{
    public function friends()
    {
        // return $this->belongsToMany(self::class, 'friends', 'user_id', 'friend_id')->withTimestamps()->withPivot();

        return $this->belongsToMany(self::class, 'friends', 'friend_id', 'user_id')->withTimestamps();
    }

    public function getTotalUsersAttached()
    {
        $to = $this->belongsToMany(self::class, 'friends', 'friend_id', 'user_id')
            ->withTimestamps()->withPivot(['user_id', 'friend_id', 'status'])->get();
        $from = $this->belongsToMany(self::class, 'friends', 'user_id', 'friend_id')
            ->withTimestamps()->withPivot(['user_id', 'friend_id', 'status'])->get();
        $get = collect($to)->merge($from);
        return $get;
    }

    public function friendRequests()
    {
        return $this->belongsToMany(self::class, 'friends', 'friend_id', 'user_id')->wherePivot('status', 'pending');
    }

    public function sentRequests()
    {
        return $this->belongsToMany(self::class, 'friends', 'user_id', 'friend_id')->wherePivot('status', 'pending');
        // return $this->belongsToMany(self::class, 'friends', 'user_id', 'friend_id')->wherePivot('status','pending');
    }

    public function myFriends()
    {

        $from = $this->belongsToMany(self::class, 'friends', 'friend_id', 'user_id')
            ->wherePivot('status', 'accepted')->withTimestamps()
            ->pluck('user_id')->toArray();
        $to = $this->belongsToMany(self::class, 'friends', 'user_id', 'friend_id')
            ->wherePivot('status', 'accepted')->withTimestamps()
            ->pluck('friend_id')->toArray();

        return array_merge($from, $to);

        // dd($all,auth()->user()->id);
    }
}
