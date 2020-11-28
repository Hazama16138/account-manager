<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->string('name', 40);
            $table->string('kana', 100);
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('user');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('category_id')->on('category');
            $table->timestamp('create_date')->useCurrent();
            $table->timestamp('update_date')->useCurrent();
            $table->timestamp('delete_date')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
        Schema::disableForeignKeyConstraints();
    }
}
