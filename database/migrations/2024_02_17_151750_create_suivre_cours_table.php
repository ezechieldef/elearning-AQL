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
        Schema::create('suivre_cours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cours_id');
            $table->foreign('cours_id')->references('id')->on('cours');
            $table->unsignedBigInteger('etudiant_id');
            $table->foreign('etudiant_id')->references('id')->on('users');
            $table->boolean('isCompleted')->default(false);
            $table->integer('Note')->nullable();
            $table->date('DateInscription');
            $table->date('DateDebutComposition')->nullable();
            $table->date('DateCompletion')->nullable();
            $table->softDeletes();
            $table->unique(['cours_id', 'etudiant_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suivre_cours');
    }
};
