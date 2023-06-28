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
        Schema::create('reservations', function (Blueprint $table) {
            // $table->id();
            $table->uuid("id")->primary();
            $table->string("etat_reservation");
            $table->string("totalttc");
            $table->dateTime("date_debut");
            $table->dateTime("date_fin");
            $table->string('verification_token')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->unsignedBigInteger('car_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign("car_id")
            ->references("id")->on("cars")
            ->onDelete("cascade");
            $table->foreign("user_id")
            ->references("id")->on("users")
            ->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
