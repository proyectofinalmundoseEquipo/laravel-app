<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function category()
    {
        return $this->belongsTo('App\Category'); // obtiene todos los registros de category
    }


}
