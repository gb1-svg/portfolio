<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique(); // Untuk URL yang rapi
            $table->text('short_description');
            $table->longText('long_description')->nullable();
            $table->string('image')->nullable(); // Path gambar thumbnail
            $table->string('demo_url')->nullable();
            $table->string('github_url')->nullable();
            $table->json('technologies')->nullable(); // Untuk menyimpan array tag/teknologi
            $table->boolean('is_published')->default(false); // Untuk kontrol publikasi
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};