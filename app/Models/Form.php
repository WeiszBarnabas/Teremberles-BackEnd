<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = ['id', 'name', 'description', 'place', 'address' ];
    public $timestamps = false;

}
