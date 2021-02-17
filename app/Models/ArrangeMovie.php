<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArrangeMovie extends Model
{
    protected $tablee ='arrange_movies';

    public function movies(){
        return $this->hasMany('App\Models\Movie','id','movie_id');
    }
}
