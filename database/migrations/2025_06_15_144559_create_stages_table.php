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
        Schema::create('stages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->unique();
            $table->text('description');
            $table->foreignId('engine_id');
            $table->integer('engine_count')->default(1);
            $table->foreignId('booster_id')->constrained('engines')->nullable();
            $table->integer('booster_count')->default(0);
            $table->enum('environment_zone', ['vacuum', 'atmosphere']); // environment, but probably i need to redefine it
            $table->foreignId('celestial_body_id');
            $table->integer('required_delta_v')->default(1);
            $table->float('twr')->default(1)->comment('Thrust-to-weight ratio');
            $table->float('dry_mass')->default(0);
            $table->float('wet_mass')->default(0);
            $table->float('fuel_mass')->default(0);
            $table->integer('cargo_mass')->default(1);
            $table->float('trust')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stages');
    }
};
