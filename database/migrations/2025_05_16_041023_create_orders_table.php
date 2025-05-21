<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('tax', 10, 2);
            $table->decimal('shipping', 10, 2);
            $table->decimal('discount', 10, 2)->default(0.00);
            $table->decimal('total', 10, 2);
            $table->string('promo_code')->nullable();
            $table->text('notes')->nullable();
            $table->string('status')->default('pending');
            $table->string('email')->nullable(); // For guest orders
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};