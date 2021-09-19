<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("basket_id")->unsigned();
            $table->decimal('order_amount', 10, 4);

            $table->string("namesurname",50)->nullable();
            $table->string("location",50)->nullable();
            $table->string("phonenumber",50)->nullable();
            $table->string('bank', 30)->nullable();
            $table->integer('installment_qty')->nullable();

           /* $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('update_at')->default(DB::raw('CURRENT_TIMESTAMP on UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('delete_at')->nullable();*/

            $table->unique('basket_id');
            $table->foreign('basket_id')->references('id')->on("basket")->onDelete('cascade');


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
        Schema::dropIfExists('order');
    }
}
