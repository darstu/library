<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRezervacijosTable extends Migration
{
    public $tableName = 'rezervacijos';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_rez');
            $table->date('paemimas')->nullable();
            $table->date('grazinimas')->nullable();
            $table->unsignedInteger('fk_skaitytojas');
            $table->unsignedInteger('fk_objektas');


            //skaitytojas
            $table->index('fk_skaitytojas', 'fkc_rezervacijos_fk_skaitytojas1_idx');
            $table->foreign('fk_skaitytojas', 'fkc_rezervacijos_fk_skaitytojas1_idx')
                ->references('id')->on('skaitytojai')
                ->onDelete('no action')
                ->onUpdate('no action');

            //objektas
            $table->index('fk_objektas', 'fkc_rezervacijos_fk_objektas1_idx');
            $table->foreign('fk_objektas', 'fkc_rezervacijos_fk_objektas1_idx')
                ->references('id')->on('knygos')
                ->onDelete('no action')
                ->onUpdate('no action');

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
