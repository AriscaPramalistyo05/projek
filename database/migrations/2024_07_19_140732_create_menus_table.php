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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable();
            $table->string('title');
            $table->text('deskripsi')->nullable();
            $table->decimal('harga');
            $table->enum('kategori', ['Paket Murah', 'Paket Ekonomi', 'Paket Premium', 'Snack', 'Minuman']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
