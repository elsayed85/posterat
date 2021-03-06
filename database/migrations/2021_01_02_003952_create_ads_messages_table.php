<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ad_id')->nullable();
            $table->string('message');
            $table->unsignedBigInteger('from_user_id')->nullable();
            $table->unsignedBigInteger('to_user_id')->nullable();
            $table->foreign('from_user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign('to_user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign('ad_id')->references('id')->on('ads')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('ads_messages');
    }
}
