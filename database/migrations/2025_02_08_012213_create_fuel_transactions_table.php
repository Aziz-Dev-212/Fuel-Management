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
        Schema::create('fuel_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fuel_type_id')->constrained('fuel_types')->onDelete('cascade');
            $table->decimal('quantity', 10, 2);
            $table->enum('action', ['add', 'consume']);
            $table->foreignId('car_id')->nullable()->constrained('cars')->onDelete('cascade');
            // $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->foreignId('service_id')->nullable()->constrained('services')->change();
            $table->dateTime('transaction_date')->default(now());
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fuel_transactions');
    }
};
