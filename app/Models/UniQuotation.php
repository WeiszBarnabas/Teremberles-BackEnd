<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UniQuotation extends Model
{
    protected $fillable = [
        'name',
        'quantity',
        'excluding_vat',
        'vat',
        'gross_amount'
    ];
    public $timestamps = false;
}
