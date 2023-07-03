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
        Schema::create('skors', function (Blueprint $table) {
            $table->id();
            $table->string('klub_name');
            $table->integer('skor')->default(0);
            $table->integer('status')->nullable();
            $table->string('klub_name_2');
            $table->integer('skor_2')->default(0);
            $table->integer('status_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skors');
    }
};
