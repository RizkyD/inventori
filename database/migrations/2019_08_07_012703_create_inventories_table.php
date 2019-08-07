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
            $table->string('desc');
            $table->unsignedBigInteger('id_type');
            $table->unsignedBigInteger('id_room');
            $table->char('code_inv');
            $table->unsignedBigInteger('id_user');
            $table->integer('qty');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('inventories', function ($table) {
            $table->foreign('id_type')->references('id')->on('types');
            $table->foreign('id_room')->references('id')->on('rooms');
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
        Schema::dropIfExists('inventories');
        Schema::enableForeignKeyConstraints();
    }
}
