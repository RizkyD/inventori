<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_inventory')->nullable();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->integer('qty');
            $table->enum('status_borrow', ['returned','borrowed']);
            $table->timestamps();
        });

        Schema::table('borrows', function ($table) {
            $table->foreign('id_inventory')->references('id')->on('inventories');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('borrows');
        Schema::enableForeignKeyConstraints();
    }
}
