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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->char('transaction_no',13);
            $table->unsignedbigInteger('payer_no')->nullable(false);
            $table->unsignedbigInteger('payee_no')->nullable(false);
            $table->enum('type',array("Transfer", "Deposit"))->default("Transfer");
            $table->unsignedDouble('price',11,2)->comment('price before wage');
            $table->unsignedDouble('wage',11,2)->default(500);
            $table->unsignedDouble('total_price',11,2)->comment('price after wage');
            $table->enum('status',array("Pending", "Completed", "Canceled"))->default("Pending");
            $table->string('description');
            $table->timestamps();

            $table->foreign('payer_no')->references('card_no')->on('cards');
            $table->foreign('payee_no')->references('card_no')->on('cards');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tranfers');
    }
};
