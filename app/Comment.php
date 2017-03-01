<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
        'post_id',
        'is_active',
        'author',
        'body',
        'photo',
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

    public function getIsActiveAttribute($value){
        return ($value == 1) ? strtoupper('active') : strtoupper('not active');
    }

    /**
     *
     *  Relationships
     *
     */

    // One to many
    public function replies(){
        return $this->hasMany('App\CommentReply');
    }

    public function post(){
        return $this->belongsTo('App\Post');
    }
}
