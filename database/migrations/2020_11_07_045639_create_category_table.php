<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->increments('category_id');
            $table->string('name', 40);
            $table->unsignedInteger('parent_id')->default(0);
            $table->foreign('parent_id')->references('category_id')->on('category');
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
        Schema::dropIfExists('category');
        Schema::disableForeignKeyConstraints();
    }
}
