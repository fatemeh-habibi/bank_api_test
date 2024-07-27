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
        Schema::create('accounts', function (Blueprint $table) {
            $table->unsignedBigInteger('account_no')->primary();
            $table->unsignedSmallInteger('bank_id');
            $table->unsignedSmallInteger('user_id');
            $table->enum('type', array("Chequing", "Savings"))->default('Savings');
            $table->unsignedDouble('balance',12,2);
            $table->unsignedTinyInteger('activated')->default(1)->comment('Activation status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('bank_id')->references('id')->on('banks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
