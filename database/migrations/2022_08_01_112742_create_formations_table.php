<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string("intitule");
            $table->integer("duree");
            $table->string("cible",30)->nullable()->default("lapin");
            $table->string("photo");
            $table->foreignId('formateur_id')->nullable()->constrained("users")->onDelete("set null");
            $table->text("description");
            $table->text("modalite");
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
        Schema::dropIfExists('formations');
    }
}
