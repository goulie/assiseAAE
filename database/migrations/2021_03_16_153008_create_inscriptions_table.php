<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
        $table->id();
        $table->string('nom');
        $table->string('prenoms');
        $table->string('email');
        $table->string('membre_AAE');
        $table->BigInteger('type_membre_id')->unsigned();
        $table->string('organisation');
        $table->string('fonction');
        $table->string('autr_type_org');
        $table->string('part_sondage2020');
        $table->string('raison_sondage');
        $table->string('autre_raison_sondage');
        $table->BigInteger('type_org_id')->unsigned();
        $table->BigInteger('pays_id')->unsigned();
        $table->BigInteger('genre_id')->unsigned();
        $table->BigInteger('code_cs')->unsigned();
        $table->BigInteger('code_assise')->unsigned();
        $table->date('date');
        $table->time('heure');
        
$table->foreign('code_cs')->references('id')->on('comite_specials')->onUpdate('cascade');

$table->foreign('code_assise')->references('id')->on('assises')->onUpdate('cascade');
       
$table->foreign('genre_id')->references('id')->on('sexes')->onUpdate('cascade');
       
$table->foreign('pays_id')->references('id')->on('pays')->onUpdate('cascade');
        
$table->foreign('type_org_id')->references('id')->on('type_organisations')->onUpdate('cascade');

$table->foreign('type_membre_id')->references('id')->on('type_membres')->onUpdate('cascade');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscriptions');
    }
}
