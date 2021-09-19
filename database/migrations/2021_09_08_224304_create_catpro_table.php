<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatproTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("catpro", function (Blueprint $table) {
            $table->increments("id");
            $table->integer("category_id")->unsigned();
            $table->integer("product_id")->unsigned();

            /* TODO: burada foreign key kısmında category_id ve product_id isimleri vermeyince hata veriyor sebebi nedir bilmiyorum */

            $table->foreign("category_id")->references("id")->on("category")->onDelete("cascade");
            $table->foreign("product_id")->references("id")->on("product")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("catpro");
    }
}
