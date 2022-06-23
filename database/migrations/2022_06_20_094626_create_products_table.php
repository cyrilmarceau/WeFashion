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
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->decimal('price',8,2);

            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->nullable()->references('id')->on('categories')->onDelete('set null');

            $table->enum('status', ['on_sale', 'standard']);
            $table->enum('visibility', ['published', 'unpublished']);
            $table->string('reference', 16);
            
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
