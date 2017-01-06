<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    protected $fillable = ['designer','username','picture','telephone','sex','wetchat','address','scheme_time','budget'];


}
