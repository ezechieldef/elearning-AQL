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
        Schema::create('session_meets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etudiant_id');
            $table->foreign('etudiant_id')->references('id')->on('users');
            $table->dateTime("DateDebut");
            $table->string('Lien', 500);
            $table->boolean('isApproved')->default(false);
            $table->boolean("isCompleted")->default(false);
            $table->boolean("isRejected")->default(false);
            $table->string("MotifRejet")->nullable();
            $table->string("status")->default("EN ATTENTE")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_meets');
    }
};
