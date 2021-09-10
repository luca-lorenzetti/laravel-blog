<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Tag extends Model
{

    public function posts(){
        return $this->belongsToMany('App\Post');
    }
}
