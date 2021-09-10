<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Tag extends Model
{

    private $slug;
    private $name;

    public function __construct(string $name)
    {
        $this->setName($name);
        $this->setSlug(Str::slug($this->getName(), '-'));
    }

    public function getSlug(){
        return $this->slug;
    }

    public function setSlug(string $slug){
        $this->slug = $slug;
    }

    public function getName(){
        return $this->name;
    }

    public function setName(string $name){
        $this->name = $name;
    }


    public function posts(){
        return $this->belongsToMany('App\Post');
    }
}
