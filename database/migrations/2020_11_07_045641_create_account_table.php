<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->unsignedInteger('customer_id');
            // $table->foreign('customer_id')->references('customer_id')->on('customer');
            $table->unsignedInteger('account_id');
            $table->text('url');
            $table->string('login_id', 256);
            $table->string('password', 256);
            $table->unsignedInteger('kind_id');
            // $table->foreign('kind_id')->references('kind_id')->on('kind');
            $table->text('note');
            $table->timestamp('create_date')->useCurrent();
            $table->timestamp('update_date')->useCurrent();
            $table->timestamp('delete_date')->useCurrent();

            $table->primary(['account_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account');
    }
}
