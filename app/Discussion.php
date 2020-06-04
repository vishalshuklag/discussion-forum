<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'channel_id'];

    public function user() {
        return $this->belongsTO(User::class);
    }

    public function getRouteKeyName () {
        return 'slug';
    }
}
