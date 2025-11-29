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
    Schema::create('recipes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('title');
        $table->text('description');
        $table->string('main_image')->nullable();
        $table->string('servings')->nullable();
        $table->string('duration')->nullable();
        $table->foreignId('category_id')->constrained()->onDelete('cascade');
        $table->json('ingredients')->nullable();
        $table->json('steps')->nullable();
        $table->json('step_images')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
