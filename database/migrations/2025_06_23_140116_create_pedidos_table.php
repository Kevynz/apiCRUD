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
    Schema::create('pedidos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Chave estrangeira para o usuário
        $table->decimal('valor_total', 10, 2); // Valor total do pedido, ex: 199.99
        $table->enum('status', ['pendente', 'pago', 'enviado', 'cancelado'])->default('pendente'); // Status do pedido
        $table->text('detalhes')->nullable(); // Um campo para detalhes extras, como produtos (em formato JSON, por exemplo)
        $table->timestamps(); // Cria as colunas created_at e updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
