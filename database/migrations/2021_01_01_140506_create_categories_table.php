<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_ar');
            $table->string('title_en');
            $table->string('description_ar');
            $table->string('description_en');
            $table->unsignedBigInteger('parent')->nullable();
            $table->unsignedSmallInteger('deep')->default(0);
            $table->boolean('published')->default(1);
            $table->boolean('is_menu')->nullable()->default(0);
            $table->boolean('premium_ads_is')->nullable()->default(1);
            $table->unsignedSmallInteger('premium_ads_num')->nullable()->default(0);//number of current ads running
            $table->bigInteger('order_is')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();//admin
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('parent')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('NO ACTION');
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
        Schema::dropIfExists('categories');
    }
}
