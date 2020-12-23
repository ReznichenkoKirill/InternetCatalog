<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->char('name');
            $table->text('description');
            $table->integer('manufacturer_id')
                ->unsigned()
                ->index();
            $table->foreign('manufacturer_id')
                ->references('id')
                ->on('manufacturers'); // Связка с таблицой производителей по внешнему ключу
            $table->decimal('price', 8, 2);
            $table->integer('site_id')
                ->unsigned()
                ->index();
            $table->foreign('site_id')
                ->references('id')
                ->on('sites');
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
        Schema::drop('products');
    }
}
