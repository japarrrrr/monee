<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            // Pemilik kategori
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // Informasi kategori
            $table->string('name', 100);
            $table->enum('type', ['income', 'expense']);
            $table->string('icon', 50)->nullable();
            $table->string('color', 20)->nullable();

            $table->timestamps();

            // Mencegah nama kategori duplikat untuk jenis dan pengguna yang sama
            $table->unique(['user_id', 'name', 'type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};