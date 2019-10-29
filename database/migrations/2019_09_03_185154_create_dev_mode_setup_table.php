<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevModeSetupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dev_mode_setup', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('developer_mode')->default(1);
            $table->integer('attendance_type')->default(1);
            $table->integer('developer')->default(100);
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
        Schema::dropIfExists('dev_mode_setup');
    }
}
