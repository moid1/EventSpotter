<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function eventPictures()
    {
        return $this->hasMany(EventsPictures::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->with('profilePicture')->with('followers');
    }

    public function comment()
    {
        return $this->hasMany(Comments::class);
    }
    public function like()
    {
        return $this->hasMany(Likes::class);
    }

    public function livefeed(){
        return $this->hasMany(EventFeeds::class);
    }
}
