<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePremiumAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premium_ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ad_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->timestamp('from')->nullable();
            $table->timestamp('to')->nullable();
            $table->decimal('price',8,2)->nullable();
            $table->string('promo_code')->nullable();
            $table->decimal('discount_value',8,2)->default(0);
            $table->decimal('total_price',8,2);
            $table->boolean('published')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->mediumText('response')->nullable();
            $table->unsignedBigInteger('premium_position_day_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign('ad_id')->references('id')->on('ads')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('premium_position_day_id')->references('id')->on('premium_position_days')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');

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
        Schema::dropIfExists('premium_ads');
    }
}
