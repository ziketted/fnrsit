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
        Schema::create('projets', function (Blueprint $table) {
            $table->id();

            $table->string('titre');
            $table->string('budget');
            $table->string('debut');
            $table->string('fin');
            $table->unsignedBigInteger('entrepreneur_id');
            $table->unsignedBigInteger('secteur_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict')
                ->unUpdate('restrict');

            $table->foreign('entrepreneur_id')
                ->references('id')
                ->on('entrepreneurs')
                ->onDelete('restrict')
                ->unUpdate('restrict');

             $table->foreign('secteur_id')
                ->references('id')
                ->on('secteurs')
                ->onDelete('restrict')
                ->unUpdate('restrict');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};
