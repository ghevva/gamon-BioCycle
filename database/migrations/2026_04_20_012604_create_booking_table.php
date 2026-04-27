<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->id();

            // Relasi ke user (yang login)
            $table->foreignId('user_id')->nullable()->constrained('user')->onDelete('cascade');

            // Jenis sampah
            $table->enum('type', ['minyak', 'plastik']);

            // Data umum
            $table->string('name');

            // Khusus minyak (liter)
            $table->integer('volume')->nullable();

            // Khusus plastik (kg)
            $table->integer('weight')->nullable();

            // Jadwal datang
            $table->date('date');
            $table->time('time');

            // Nomor antrian
            $table->integer('queue_number');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};