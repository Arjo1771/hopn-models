<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_create_model_profiles_table.php
public function up()
{
    Schema::create('model_profiles', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('slug')->unique();
        $table->string('gender');
        $table->string('city');
        $table->string('model_type');
        $table->decimal('price', 8, 2);
        $table->text('bio')->nullable();
        $table->string('youtube')->nullable();
        $table->string('instagram')->nullable();
        $table->string('tiktok')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_profiles');
    }
};
