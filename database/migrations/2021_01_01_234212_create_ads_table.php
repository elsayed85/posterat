<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('address')->nullable();
            $table->enum('type_is', ['personal', 'business'])->nullable();
            $table->string('mode')->nullable();//rent , sale, required
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('details')->nullable();
            $table->string('tags')->nullable();//determined by comma
            $table->decimal('cost',8,2)->nullable();
            $table->boolean('cost_hide')->default(0);
            $table->boolean('via_message')->default(0);
            $table->boolean('disturb_hours')->default(0);
            $table->char('disturb_hours_from',5)->nullable();//24 hors
            $table->char('disturb_hours_to',5)->nullable();
            $table->boolean('phone_show')->default(0);
            $table->unsignedInteger('phone')->nullable();
            $table->boolean('whatsapp_show')->default(0);
            $table->unsignedInteger('whatsapp')->nullable();
            $table->string('image')->nullable();
            $table->boolean('published')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->boolean('premium')->default(0);
            $table->boolean('reviewed')->default(0);
            $table->boolean('featured')->default(1);
            $table->boolean('archived')->default(0);
            $table->boolean('archived_manually')->default(0);
            $table->timestamp('archived_at')->nullable();
            $table->boolean('sold')->default(0);
            $table->unsignedInteger('total_views')->default(0);
            $table->unsignedInteger('total_likes')->default(0);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('NO ACTION');
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
        Schema::dropIfExists('ads');
    }
}

/*$details = $ad->details;

$details['color'] = 'blue';
$details['size'] = 500;
$details['model'] = 2010;

$ad->details = $details;

$ad->save();
$ad->update(['details->color' => 'red','details->num' => '800','details->example' => '*',]);
foreach ($ad->details as $detail=>$value){
    dump( $detail);     dump( $value);

}
dd($ad);

  */