<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("marque");
            $table->string("image");
            $table->string("gasoil");
            $table->string("boite_vitesse");
            $table->string("climatisation");
            $table->integer("places");
            $table->integer("valises");
            $table->integer("portes");
            $table->string("prix");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
