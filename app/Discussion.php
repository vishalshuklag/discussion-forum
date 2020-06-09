<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'channel_id'];

    public function user() {
        return $this->belongsTO(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }


    public function getRouteKeyName () {
        return 'slug';
    }

    public function markAsBestReply(Reply $reply)
    {
        // dd($reply->id);
        $this->update([
            'reply_id' => $reply->id
        ]);
    }

    public function getBestReply()
    {
        return Reply::find($this->reply_id);
    }

    public function bestReply()
    {
        return $this->belongsTo(Reply::class, 'reply_id');
    }

    /**
     * getBestReply() and
     * bestReply()
     *  are used for same functionality 
     * i.e return reply_id that is marked as best reply
     */

     public function scopeFilterByChannels( $builder ) 
     {
        if( request()->query('channel'))
        {
            //filter by  channel

            //get channel
            $channel = Channel::where('slug', request()->query('channel'))->first();

            if($channel) {

                return $builder->where('channel_id', $channel->id);
            }

            return $builder;
        }

        return $builder;
     }
}
