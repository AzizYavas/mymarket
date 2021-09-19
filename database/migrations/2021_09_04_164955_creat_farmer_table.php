<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatFarmerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('far_name',50)->nullable();
            $table->string('far_surname',50)->nullable();
            $table->string('password', 60);
            $table->string('far_phonenumber',100)->nullable();
            $table->string('far_email',50)->nullable();
            $table->string('far_location',50)->nullable();
            $table->string('far_status',30)->nullable();
            $table->string('activation_key', 60)->nullable();
            $table->boolean('active')->default(0);
            $table->rememberToken();
            $table->timestamp('update_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP on UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('delete_at')->nullable();
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
