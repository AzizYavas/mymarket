<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketDetayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_detay', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('market_id')->unsigned();
                $table->string('location', 200)->nullable();
                $table->timestamp('update_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP on UPDATE CURRENT_TIMESTAMP'));
                $table->timestamp('delete_at')->nullable();

                $table->foreign('market_id')->references('id')->on('market')->onDelete('cascade');

            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('market_detay');
    }
}
