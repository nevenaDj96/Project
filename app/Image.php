<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable=['user_id',];
    public function Users(){
        return $this->hasOne('App\User','id','user_id');
    }


}
