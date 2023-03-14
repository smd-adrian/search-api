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
        Schema::create('search_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('search_id');
            $table->string('name', 500);
            $table->double('percentage');
            $table->string('state');
            $table->string('place');
            $table->string('city');
            $table->integer('active_years');
            $table->string('type_person');
            $table->string('type_position');
            $table->timestamps();
        });

        Schema::table('search_items', function ($table) {
            $table->foreign('search_id')->references('id')->on('searches');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('search_items');
    }
};
