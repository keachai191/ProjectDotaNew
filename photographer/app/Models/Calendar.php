<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Calendar extends Model
{

    protected $table ='evenement';

    protected $dates =['start','end'];
}

