<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocaleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locale_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('locale_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('locale_id')
                  ->references('id')
                  ->on('locales');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locale_user');
    }
}
