<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{

    protected $table ='users';

    public function likes(){
        return $this->hasMany(\App\Models\Review::class,"user_id")
            ->where('like','=',1);
    }
}

