<?php

// 2025_05_12_071842_create_tasks_table.php - VERSI LENGKAP
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('deadline')->nullable();
            $table->boolean('completed')->default(false);
            $table->timestamp('completed_at')->nullable();
            
            // Tambahkan user_id langsung di sini, tidak perlu migrasi terpisah
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            
            $table->timestamps();
            
            // Tambahkan index untuk performa query
            $table->index(['user_id', 'completed']);
            $table->index('deadline');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
