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
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id')->references('id')->on('categories');
            $table->string('Titre');
            $table->text('Description');
            $table->string('Image')->nullable();
            $table->text('Contenu');
            $table->unsignedBigInteger('Professeur_id');
            $table->foreign('Professeur_id')->references('id')->on('users');
            $table->integer("NoteAdmission")->nullable();

            $table->boolean("isPublished")->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cours');
    }
};
