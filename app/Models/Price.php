<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = ['egyetem', 'egyetem_hetvege', 'kulso', 'kulso_hetvege', 'category'];
    public $timestamps = false;
}
