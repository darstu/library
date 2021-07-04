<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnygosTable extends Migration
{
    public $tableName = 'knygos';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_Knygos');
            $table->string('pavadinimas',30)->nullable();
            $table->integer('metai')->nullable();
            $table->string('kalba',30)->nullable();
            $table->integer('puslapiai')->nullable();
            $table->string('santrauka')->nullable();
            $table->unsignedInteger('zanras');
            $table->unsignedInteger('leidykla');
            $table->unsignedInteger('fk_autorius');


            //zanras
            $table->index('zanras', 'fkc_knygos_fk_zanras1_idx');
            $table->foreign('zanras', 'fkc_knygos_fk_zanras1_idx')
                ->references('id_Zanras')->on('zanrai')
                ->onDelete('no action')
                ->onUpdate('no action');

            //leidykla
            $table->index('leidykla', 'fkc_knygos_fk_leidykla1_idx');
            $table->foreign('leidykla', 'fkc_knygos_fk_leidykla1_idx')
                ->references('id_Leidykla')->on('leidyklos')
                ->onDelete('no action')
                ->onUpdate('no action');

            //autorius
            $table->index('fk_autorius', 'fkc_knygos_fk_autorius1_idx');
            $table->foreign('fk_autorius', 'fkc_knygos_fk_autorius1_idx')
                ->references('id')->on('autoriai')
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
