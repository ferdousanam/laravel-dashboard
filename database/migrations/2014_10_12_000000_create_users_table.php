<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('name');
        $table->string('email')->unique();
        $table->string('profile_image')->nullable();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->integer('user_level')->default(0);
        $table->tinyInteger('status')->default(1);
        $table->rememberToken();
        $table->timestamp('last_login_at')->nullable();
        $table->string('last_login_ip')->nullable();
        $table->timestamp('last_failed_login_at')->nullable();
        $table->string('last_failed_login_ip')->nullable();
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
    Schema::dropIfExists('users');
  }
}
