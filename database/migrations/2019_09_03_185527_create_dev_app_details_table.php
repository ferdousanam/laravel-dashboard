<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevAppDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dev_app_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('app_name');
            $table->string('company_name');
            $table->string('company_address');
            $table->string('company_contact');
            $table->string('company_logo')->default('logo.png');
            $table->string('brand_logo')->default('brand.png');
            $table->string('app_icon')->default('favicon.ico');
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
        Schema::dropIfExists('dev_app_details');
    }
}
