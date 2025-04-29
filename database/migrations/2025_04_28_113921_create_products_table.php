<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('pro_id');
            $table->string('pro_code')->unique();
            $table->string('pro_name');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('cat_id')->on('categories')->onDelete('set null');
            $table->integer('qty');
            $table->decimal('price', 8, 2);
            $table->text('description')->nullable();
            $table->decimal('discount', 5, 2)->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}