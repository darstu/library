<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class autor extends Model
{
    protected $table = 'autoriai';

    protected $fillable = ['id', 'vardas', 'pavarde','biografija', 'data' ];

    /* nurodome kad  nenaudosime created_at ir updated_at laukų šiame modulyje*/
    public $timestamps = false;
}
