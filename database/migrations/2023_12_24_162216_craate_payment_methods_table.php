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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('method')->nullable(true);
            $table->boolean('status')->default(false);
            $table->text('api1')->nullable(true);
            $table->text('api2')->nullable(true);
            $table->text('api3')->nullable(true);
            $table->text('api4')->nullable(true);
            $table->text('api5')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};
