<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
      'file'
    ];

    protected $uploads = '/images/';

    /**
     *
     *  Accessors
     *
     */

    public function getFileAttribute($value){
        return $this->uploads . $value;
    }

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->diffForHumans();
    }

    public function getUpdatedAtAttribute($value){
        return Carbon::parse($value)->diffForHumans();
    }



}
