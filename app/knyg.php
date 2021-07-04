<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class knyg extends Model
{
    protected $table = 'knygos';

    protected $fillable = ['id_Knygos', 'pavadinimas', 'metai', 'kalba', 'puslapiai', 'santrauka', 'zanras', 'leidykla', 'fk_autorius'];

    /* nurodome kad  nenaudosime created_at ir updated_at laukų šiame modulyje*/
    public $timestamps = false;
}
