<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkaitytojaiTable extends Migration
{
    public $tableName = 'skaitytojai';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('pavarde',30)->nullable();
            $table->string('vardas',30)->nullable();
            $table->date('gimimo_data')->nullable();
            $table->string('gyvenamoji_vieta')->nullable();
            $table->string('telefonas',9)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
