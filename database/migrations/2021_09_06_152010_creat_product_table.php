<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('category_wayid')->unsigned();
            $table->integer('farmer_id')->unsigned();
            $table->string('prod_name', 60);
            $table->string('slug', 60);
            $table->string('prod_price', 100)->nullable();
            $table->string('prod_quantity', 50)->nullable();
            $table->string('status', 40);
            $table->text('image_path');
            $table->text('product_desc');
            $table->timestamp('update_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP on UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('delete_at')->nullable();

            $table->foreign('category_wayid')->references('id')->on('category')->onDelete('cascade');
            $table->foreign('farmer_id')->references('id')->on('farmer')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
