<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leid extends Model
{
    protected $table = 'leidyklos';

    protected $fillable = ['id_Leidykla', 'name'];

    /* nurodome kad  nenaudosime created_at ir updated_at laukų šiame modulyje*/
    public $timestamps = false;
}
