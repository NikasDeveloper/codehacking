<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = [
        'comment_id',
        'is_active',
        'author',
        'body',
        'photo'
    ];

    /**
     *
     *  Accessors
     *
     */

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->diffForHumans();
    }

    public function getUpdatedAtAttribute($value){
        return Carbon::parse($value)->diffForHumans();
    }

    /**
     *
     *  Relationships
     *
     */

    //One to One
    public function comment(){
        return $this->belongsTo('App\Comment');
    }
}
