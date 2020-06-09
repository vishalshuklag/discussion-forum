<?php

namespace App;

class Reply extends Model
{

    protected $fillable = ['user_id', 'discussion_id', 'content'];

    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function discussion () {
        return $this->belongsTo(Discussion::class);
    }
}
