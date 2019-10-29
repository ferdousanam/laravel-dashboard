<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriorityMenuSubMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priority_menu_sub_menu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('priority_id');
            $table->bigInteger('main_menu_id');
            $table->bigInteger('sub_menu_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('priority_menu_sub_menu');
    }
}
