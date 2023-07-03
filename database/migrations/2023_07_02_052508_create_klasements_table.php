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
        Schema::create('klasements', function (Blueprint $table) {
            $table->id();
            $table->string('klub_name');
            $table->string('klub_city');
            $table->integer('main')->default(0);
            $table->integer('menang')->default(0);
            $table->integer('seri')->default(0);
            $table->integer('kalah')->default(0);
            $table->integer('gol_menang')->default(0);
            $table->integer('gol_kalah')->default(0);
            $table->integer('point')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klasements');
    }
};
