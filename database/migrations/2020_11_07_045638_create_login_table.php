<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->string('mail', 128);
            $table->string('password', 256);
            $table->timestamp('create_date')->useCurrent();
            $table->timestamp('update_date')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('login');
        Schema::disableForeignKeyConstraints();
    }
}
