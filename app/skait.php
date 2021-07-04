<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class skait extends Model
{
    protected $table = 'skaitytojai';

    protected $fillable = ['id', 'pavarde', 'vardas','gimimo_data','gyvenamoji_vieta','telefonas' ];

    /* nurodome kad  nenaudosime created_at ir updated_at laukų šiame modulyje*/
    public $timestamps = false;

}
