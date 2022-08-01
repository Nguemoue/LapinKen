<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string("photo1")->nullable(true)->default("lapins/photo_lapin.jpg");
            $table->string("photo2")->nullable(true)->default("lapins/photo_lapin.jpg");
            $table->integer("fake_prix")->default(0);
            $table->set("sexe",["Masculin","Feminin"])->default("Masculin");
            $table->foreignId("type_animal")->constrained();
            $table->integer("prix");
            $table->string("categorie");
            $table->integer("quantite");
            $table->float("poids");
            $table->date("date_naissance");
            $table->string("race");
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
        Schema::dropIfExists('animals');
    }
}
