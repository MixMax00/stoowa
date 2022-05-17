<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_title');
            $table->foreignId('user_id')->constrained();
            $table->string('slug');
            $table->string('sku');
            $table->string('short_description');
            $table->decimal('price');
            $table->decimal('sale_price')->nullable();
            $table->integer('quantity');
            $table->text('description')->nullable();
            $table->text('add_info')->nullable();
            $table->text('product_image');
            $table->tinyInteger('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
