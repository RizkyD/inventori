<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->enum('condition', ['good', 'poor','critical']);
            $table->string('description');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('room_id');
            $table->string('code_inv');
            $table->unsignedBigInteger('user_id');
            $table->integer('qty');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('inventories', function ($table) {
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('room_id')->references('id')->on('rooms');
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
        Schema::dropIfExists('inventories');
        Schema::enableForeignKeyConstraints();
    }
}
