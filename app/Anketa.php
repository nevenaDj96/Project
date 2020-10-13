<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anketa extends Model
{
    public $timestamps=false;

    public function Images(){
        return $this->belongsTo('App\Image','img_id', 'id');
    }
    public function Users(){
        return $this->belongsTo('App\User','user_id', 'id');
    }
}
