<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();

            // Pemilik dompet
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // Informasi dompet
            $table->string('name', 100);
            $table->enum('type', ['cash', 'bank', 'ewallet']);

            // Saldo awal dompet
            $table->decimal('opening_balance', 15, 2)->default(0);

            // Keterangan tambahan
            $table->text('description')->nullable();

            // Waktu pembuatan dan perubahan
            $table->timestamps();

            // Mempercepat pencarian dompet milik pengguna
            $table->index(['user_id', 'type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wallets');
    }
};
