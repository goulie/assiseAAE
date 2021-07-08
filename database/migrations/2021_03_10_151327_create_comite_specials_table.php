<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComiteSpecialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comite_specials', function (Blueprint $table) {
            $table->id();
            $table->string('libelle_cs');
            $table->string('sigle');
            $table->BigInteger('code_assise')->unsigned();
        $table->foreign('code_assise')->references('id')->on('assises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comite_specials');
    }
}
