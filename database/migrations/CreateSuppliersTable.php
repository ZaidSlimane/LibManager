<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id(); // Clé primaire
            $table->string('name'); // Nom du fournisseur
            $table->string('email')->unique(); // Email du fournisseur
            $table->string('password'); // Mot de passe
            $table->string('phone'); // Numéro de téléphone
            $table->string('address'); // Adresse
            $table->string('commercial_register_number'); // Numéro de registre commercial
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
        Schema::dropIfExists('suppliers');
    }
}
