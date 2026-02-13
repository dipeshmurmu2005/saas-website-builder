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
        Schema::create('onboard_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('business_name');
            $table->string('business_slug');
            $table->string('location');
            $table->string('phone');
            $table->string('contact_email');
            $table->string('plan_slug');
            $table->string('theme_slug');
            $table->string('billing_cycle');
            $table->string('domain');
            $table->decimal('subtotal', 12, 2);
            $table->decimal('total_amount', 12, 2);
            $table->decimal('discount', 12, 2);
            $table->boolean('is_trial')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('onboard_data');
    }
};
