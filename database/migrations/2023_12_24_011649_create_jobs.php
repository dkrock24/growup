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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->text('address')->nullable(true);
            $table->string('phone')->nullable(true);
            $table->dateTime('deadline')->nullable(true);
            $table->boolean('status')->default(false);
            $table->text('admin_notes')->nullable(true);
            $table->text('customer_notes')->nullable(true);
            $table->float('amount')->nullable(true);
            $table->float('fees')->nullable(true);
            $table->float('total')->nullable(true);
            $table->boolean('is_paid')->default(false);
            $table->text('payment_id')->nullable(true);
            $table->text('payment_file')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
