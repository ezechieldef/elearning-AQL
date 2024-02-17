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
        Schema::create('avis_utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('cours_id')->nullable();
            $table->foreign('cours_id')->references('id')->on('cours');

            $table->unsignedBigInteger('session_meet_id')->nullable();
            $table->foreign('session_meet_id')->references('id')->on('session_meets');

            $table->integer('Note');
            $table->string('Commentaire', 500);
            $table->boolean('isRead')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis_utilisateurs');
    }
};
