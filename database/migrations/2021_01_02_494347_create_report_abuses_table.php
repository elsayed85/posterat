<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportAbusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_abuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ad_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('reason')->nullable();
            $table->text('comment')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->boolean('viewed')->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign('ad_id')->references('id')->on('ads')->onUpdate('CASCADE')->onDelete('NO ACTION');

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
        Schema::dropIfExists('ad_abuses');
    }
}
