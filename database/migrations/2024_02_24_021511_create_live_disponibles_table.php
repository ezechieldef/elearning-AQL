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
        Schema::create('live_disponibles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('professeur_id');
            $table->foreign('professeur_id')->references('id')->on('users');
            $table->boolean("isPublished")->default(false);
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id')->references('id')->on('categories');
            $table->string("Titre");
            $table->text("Description");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('live_disponibles');
    }
};
