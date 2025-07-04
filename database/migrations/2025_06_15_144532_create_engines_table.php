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
        Schema::create('engines', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->unique();
            $table->string('image');
            $table->float('trustAtmo')->comment('Trust in atmosphere (kN)');
            $table->float('trustVacu')->comment('Trust in vacume (kN)');
            $table->float('ispAtmo')->comment('Specific impulse in atmosphere');
            $table->float('ispVacu')->comment('Specific impulse in vacume');
            $table->integer('weight');
            $table->string('size', 2);
            $table->string('fuel');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('engines');
    }
};
