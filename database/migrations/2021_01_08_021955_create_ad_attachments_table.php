<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_attachments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('file_name')->nullable();
            $table->string('file_type')->nullable();
            $table->string('file_size')->nullable();
            $table->unsignedBigInteger('ad_id')->nullable();
            $table->foreign('ad_id')->references('id')->on('ads')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('ad_attachments');
    }
}
