<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->integer('category_id');
            $table->string('title');
            $table->string('alias');
            $table->string('alif_link')->default(null);
            $table->integer('price')->default(0);
            $table->smallInteger('amount')->default(0);
            $table->text('description');
            $table->string('image')->default('');
            $table->boolean('visible')->default(1);
            $table->boolean('recommended')->default(0);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('products');
    }
}
