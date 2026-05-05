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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id(); // Chave primária auto-incremento
            $table->foreignId('user_id')->constrained()->onDelete('restrict');; // Chave estrangeira (relacionamento)
            $table->foreignId('service_id')->constrained()->onDelete('restrict');; // Chave estrangeira (relacionamento)
            $table->dateTime('scheduled_at'); // Data e hora do agendamento
            $table->string('status')->default('pending'); // Texto com valor padrão
            $table->text('notes')->nullable(); // Campo de texto que pode ser vazio
            $table->timestamps(); // Cria 'created_at' e 'updated_at'
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
