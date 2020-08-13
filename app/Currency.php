<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Currency extends Model
{
    use HasApiTokens;

    protected $guarded = [];
}
