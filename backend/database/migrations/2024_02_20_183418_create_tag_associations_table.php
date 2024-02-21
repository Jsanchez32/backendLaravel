<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tag_associations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nivel1');
            $table->unsignedBigInteger('nivel2');
            $table->unsignedBigInteger('nivel3');
            $table->unsignedBigInteger('nivel4');
            $table->timestamps();

            $table->foreign('nivel1')->references('id')->on('tags')->onDelete('cascade');
            $table->foreign('nivel2')->references('id')->on('tags')->onDelete('cascade');
            $table->foreign('nivel3')->references('id')->on('tags')->onDelete('cascade');
            $table->foreign('nivel4')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_associations');
    }
};
