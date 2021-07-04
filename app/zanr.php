<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class zanr extends Model
{
    protected $table = 'zanrai';

    protected $fillable = ['id_Zanras', 'names'];

    /* nurodome kad  nenaudosime created_at ir updated_at laukų šiame modulyje*/
    public $timestamps = false;
}
