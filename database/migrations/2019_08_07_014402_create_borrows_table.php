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
            $table->unsignedBigInteger('inventory_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('qty');
            $table->enum('status', ['returned','borrowed','request','avaliable','rejected']);
            $table->string('desc',100);
            $table->timestamp('return_schedule');
            $table->timestamp('returned_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('borrows', function ($table) {
            $table->foreign('inventory_id')->references('id')->on('inventories');
            $table->foreign('user_id')->references('id')->on('users');
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
