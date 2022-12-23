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
            $table->string('img')->nullable();
            $table->text('description')->nullable();
            $table->double('price', 10, 2);
            $table->double('old_price', 10, 2);

            $table->boolean("hit")->nullable();
            $table->boolean("new")->nullable();

            $table->string('category');
            $table->string('brand');

            $table->string('seo_title')->default("")->nullable();
            $table->text('seo_description')->default("")->nullable();
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
