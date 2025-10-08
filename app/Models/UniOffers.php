<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UniOffers extends Model
{
    protected $fillable =['forms_id','name','quantity','excluding_vat','vat','gross_amount'];
}
