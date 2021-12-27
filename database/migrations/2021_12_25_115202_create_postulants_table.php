<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostulantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulants', function (Blueprint $table) {
            $table->id();
            $table->integer('id_fil');
            $table->integer('id_tstage');
            $table->string('nom_post');
            $table->string('pren_post');
            $table->string('adress_post');
            $table->string('sexe_post');
            $table->date('naiss_post');
            $table->string('nation_post');
            $table->string('cv_post');
            $table->string('demande_post');
            $table->string('admission_post');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postulants');
    }
}
