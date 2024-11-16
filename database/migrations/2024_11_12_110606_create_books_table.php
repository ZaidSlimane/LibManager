<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // Colonne ID
            $table->string('name'); // Nom du livre
            $table->string('category'); // Catégorie du livre
            $table->string('author'); // Auteur du livre
            $table->dateTime('publication_date'); // Date de publication
            $table->integer('nb_pages'); // Nombre de pages
            $table->string('type'); // Type de livre
            $table->timestamps(); // Colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
