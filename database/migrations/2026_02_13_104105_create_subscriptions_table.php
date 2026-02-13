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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tenant_id');
            $table->unsignedBigInteger('business_id');
            $table->unsignedBigInteger('plan_id');
            $table->string('billing_cycle');
            $table->decimal('subtotal', 12, 2);
            $table->decimal('paid_amount', 12, 2);
            $table->decimal('discount_amount', 12, 2);
            $table->decimal('total_amount', 12, 2);
            $table->string('status');
            $table->timestamp('renewed_at');
            $table->timestamp('expires_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
