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
            $table->timestamps();
            $table->string('sku');
            $table->string('title');
            $table->string('slug');
            $table->string('img');
            $table->text('description');
            $table->double('price', 10, 2);
            $table->double('old_price', 10, 2);

            $table->boolean("hit");
            $table->boolean("new");

            $table->string('category');
            $table->string('brand');

            $table->string('seo_title')->default("");
            $table->text('seo_description')->default("");
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
