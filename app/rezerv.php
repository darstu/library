<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rezerv extends Model
{
    protected $table = 'rezervacijos';

    protected $fillable = ['id_rez', 'paemimas', 'grazinimas','fk_skaitytojas','fk_objektas'];

    /* nurodome kad  nenaudosime created_at ir updated_at laukų šiame modulyje*/
    public $timestamps = false;
}
