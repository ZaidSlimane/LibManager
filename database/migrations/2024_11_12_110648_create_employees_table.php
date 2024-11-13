<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); // Clé primaire
            $table->string('name'); // Nom de l'employé
            $table->string('email')->unique(); // Email de l'employé, unique
            $table->string('password'); // Mot de passe de l'employé
            $table->string('employee_number')->unique(); // Numéro d'employé unique
            $table->string('job_title'); // Titre du poste
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
        Schema::dropIfExists('employees');
    }
}
